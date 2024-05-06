<?php

namespace App\Http\Controllers\Admin;

use App\Models\AbstractModel;
use App\Models\Category;
use App\Models\Filter;
use App\Services\Notify\Facades\Notify;
use App\Traits\InteractsWithSortable;
use App\Traits\Sortable;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class CategoriesControllerAdmin extends AdminBaseController
{
    use InteractsWithSortable;

    /**
     * @var string|AbstractModel|Builder|Sortable
     */
    protected $modelClass = Category::class;

    protected $model;

    public function __construct()
    {
        parent::__construct();

        $this->model = new $this->modelClass;
    }

    /**
     * @param null $parentId
     * @return Application|Factory|RedirectResponse|View
     */
    public function index($parentId = null)
    {
        /** @var Category $parent */
        $parent = $this->modelClass::with('items')->where(['id' => $parentId])->first();

        $test = 'Невозможно добавить подраздел так как к этом разделу прикреплен товар либо превышен допустимый лимит подкатегорий';
        /*if ($parent && (count($parent->items) || $parent->deep >= env('CATEGORY_DEEP'))) {
            Notify::error(t('Admin action notify.category cant add'), $title = null, $options = []);

            return redirect()->back();
        }*/

        $data['categories'] = $this->modelClass::sort()->with(['children', 'parent', 'items'])->where('parent_id', $parentId)->get();
        $data['nestedParents'] = $parent ? $parent->getNestedParents() : [];
        $data['parent'] = $parent;

        return view('admin.pages.categories.index', $data);
    }

    /**
     * @param null $parentId
     * @return Application|Factory|View
     */
    public function create($parentId = null)
    {
        $pageData = [
            'categories' => $this->modelClass::query()->where('deep', '<=', env('CATEGORY_DEEP'))->get(),
            'parent' => $this->modelClass::query()->where(['id' => $parentId])->first()
        ];
        $pageData['nestedParents'] = $pageData['parent'] ? $pageData['parent']->getNestedParents() : [];

        return view('admin.pages.categories.create', $pageData);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'array|required',
            'name.*' => 'nullable|string|max:255',
            'name.' . $this->urlLang => 'required|string|max:255',
            'parent_id' => 'integer|nullable|max:255',
            'is_footer' => 'integer|nullable',
            'is_home' => 'integer|nullable',
            'image' => 'nullable|image',
        ], [
            'name.' . $this->urlLang . '.required' => 'Введите название (' . $this->urlLang . ') чтобы сгенерировать URL.'
        ]);
        $categoryModel = new Category;

        if ($categoryModel->fillRequest($request)) {
            Notify::success(t('Admin action notify.success added'), $title = null, $options = []);
        } else {
            Notify::error(t('Admin action notify.something wrong'), $title = null, $options = []);
        }

        return redirect()->route('admin.categories.index', ['parentId' => $request->input('parent_id')]);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $pageData = [
            'categories' => $this->modelClass::query()->where('deep', '<=', env('CATEGORY_DEEP'))->get(),
            'categoryData' => $this->modelClass::query()->where(['id' => $id])->firstOrFail()
        ];

        /** @var Category $parent */
        /*$parent = $this->modelClass::with('children')->where(['id' => $pageData['categoryData']->parent_id])->first();
        $pageData['onlyParents'] = $parent ? $parent->getNestedParents() : null;
        $pageData['parent'] = $parent;*/

        return view('admin.pages.categories.update', $pageData);
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     * @throws ValidationException
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'array|required',
            'name.*' => 'string|required|max:255',
            'parent_id' => 'integer|nullable',
            'is_footer' => 'integer|nullable',
            'is_home' => 'integer|nullable',
            'image' => 'nullable|image',
        ]);

        /** @var Category $category */
        $category = $this->modelClass::query()->where('id', $id)->first();

        if ($category->fillRequest($request)) {
            Notify::success(t('Admin action notify.success edited'), $title = null, $options = []);
        } else {
            Notify::error(t('Admin action notify.something wrong'), $title = null, $options = []);
        }

        return redirect()->route('admin.categories.index', ['parent_id' => $category->parent_id]);
    }

    /**
     * @param $id
     * @return Response|mixed
     * @throws BindingResolutionException
     * @throws Exception
     */
    public function destroy($id)
    {
        $categoryModel = $this->modelClass::query()->where(['id' => $id])->with(['items', 'children'])->first();
        if (count($categoryModel->items) > 0 || count($categoryModel->children) > 0) {
            return response()->make('Failed', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if (!$categoryModel->delete()) {
            return response()->make('Failed', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        return response()->make('Success', Response::HTTP_OK);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteImage(Request $request)
    {
        $result = ['success' => false];
        $id = $request->input('item_id');
        if ($id && is_id($id)) {
            $item = $this->modelClass::query()->where('id', $id)->first();
            if ($item && $item->deleteImage($item)) $result['success'] = true;
        }
        return response()->json($result);
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function filters($id)
    {
        $data['category'] = $this->modelClass::with('filters')->where('id', $id)->firstOrFail();
        $data['filters'] = Filter::sort()->get();

        return view('admin.pages.categories.filters', $data);
    }

    /**
     * @param $id
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function syncFilters($id, Request $request)
    {
        /** @var Category $category */
        $category = $this->modelClass::with('filters')->where('id', $id)->firstOrFail();

        $this->validate($request, [
            'filters' => 'nullable|array',
            'filters.*' => 'nullable|exists:filters,id'
        ]);

        $category->filters()->sync(array_filter($request->input('filters', [])));

        Notify::success(t('Admin action notify.success saved'));

        return redirect()->back();
    }
}
