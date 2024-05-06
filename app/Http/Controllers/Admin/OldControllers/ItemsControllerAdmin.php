<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Collection;
use App\Models\ColorFilter;
use App\Models\CountryFilter;
use App\Models\Filter;
use App\Models\Item;
use App\Models\ItemRecommended;
use App\Services\Notify\Facades\Notify;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;

class ItemsControllerAdmin extends AdminBaseController
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('admin.pages.items.index');
    }

    /**
     * @param Request $request
     * @return array
     */
    public function listPortion(Request $request)
    {
        Session::put('sort', $request->get('start') ?? 0);
        $model = Item::with(['category', 'criteria', 'recommended']);

        $search = $request->input('search');

        $result = DataTables::eloquent($model)
            ->order(function (Builder $query) use ($request) {
                if ($request->has('order')) {
                    $order = Arr::first($request->input('order'));
                    $orderColumn = $request->input("columns.{$order['column']}.data");
                    $orderDir = $order['dir'];

                    if (in_array($orderColumn, (new Item)->translatable)) {
                        $orderColumn = $orderColumn . '->' . app()->getLocale();
                    }

                    $query->orderBy($orderColumn, $orderDir);
                } else {
                    $query->orderBy('ordering', 'asc');
                    $query->orderBy('created_at', 'desc');
                }
            })->filter(function (Builder $query) use ($search) {
                if (!empty($search['value'])) {
                    $query->whereHas('category', function ($subquery) use ($search) {
                        $subquery->whereRaw('json_unquote(json_extract(categories.name, "$.'.$this->lang.'")) LIKE "%'.$search['value'].'%"');
                    });
                    $query->orWhere('title->' . app()->getLocale(), 'LIKE', '%' . $search['value'] . '%');
                    $query->orWhere('code', 'LIKE', '%' . $search['value'] . '%');
                }
            });

        $result->editColumn('active', function (Item $item) {
            return $item->active ? t('Admin pages list.active') : t('Admin pages list.inactive');
        });
        $result->editColumn('title', function (Item $item) {
            return $item->getTranslation('title', app()->getLocale());
        });
        $result->editColumn('category_name', function (Item $item) {
            $category_id = $item->category_id;
            if ($category_id !== null) {
                $category = Category::query()->select('name')->where('id', $category_id)->first();
                return $category->getTranslation('name', app()->getLocale());
            } else {
                return '';
            }
        });
        $result->editColumn('created_at', function (Item $item) {
            return $item->created_at->format('d.m.Y');//->calendar();
        });

        return $result->toArray();
    }

    /**
     * @return Application|Factory|View
     */
    public function create()
    {
        $data['title'] = t('Admin pages titles.add');
        $data['categories'] = Category::whereDeep(0)->with('children')->get();
        $data['collections'] = Collection::where('active', 1)->get();
        $data['brands'] = Brand::where('active', 1)->get();

        return view('admin.pages.items.create', $data);
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        list($rules, $messages) = $this->getValidationRules($request->input());

        $this->validate($request, $rules, $messages);

        $model = new Item();

        if (!$model->fillRequest($request)) {
            Notify::error(t('Admin action notify.something wrong'));

            return redirect()->back()->withInput($request->input());
        } else {
            Notify::success(t('Admin action notify.success added'));
            return redirect()->route('admin.items.index');
        }
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id)
    {
        $data['categories'] = Category::whereDeep(0)->with('children')->get();
        $data['collections'] = Collection::where('active', 1)->get();
        $data['brands'] = Brand::where('active', 1)->get();
        $data['item'] = Item::query()->where('id', $id)->with(['options', 'brands'])->firstOrFail();
        $data['title'] = t('Admin pages titles.edit') . " - " . $data['item']->title;

        return view('admin.pages.items.update', $data);
    }

    /**
     * @param $id
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update($id, Request $request)
    {
        list($rules, $messages) = $this->getValidationRules($request->input(), $id);

        $this->validate($request, $rules, $messages);

        /** @var Item $model */
        $model = Item::with('category')->where('id', $id)->firstOrFail();

        if (!$model->fillRequest($request)) {
            Notify::error(t('Admin action notify.something wrong'));

            return redirect()->back()->withInput($request->input());
        } else {
            Notify::success(t('Admin action notify.success edited'));
            return redirect()->route('admin.items.index');
        }
    }

    /**
     * @return array|\Illuminate\Http\JsonResponse
     * @throws \ReflectionException
     */
    public function sort()
    {
        return Item::sortable();
    }

    /**
     * @param $id
     * @return Response|mixed
     * @throws BindingResolutionException
     */
    public function delete($id)
    {
        Item::query()->where('id', $id)->delete();

        return response()->make('Deleted', Response::HTTP_OK);
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
            $item = Item::query()->where('id', $id)->first();
            if ($item && $item->deleteImage($item)) $result['success'] = true;
        }
        return response()->json($result);
    }

    /**
     * @param array $input
     * @param false $ignore
     * @return string[][]
     */
    protected function getValidationRules($input = [], $ignore = false)
    {
        $rules = [
            'title' => 'required|array',
            'title.*' => 'required|string|max:255',
            'category' => 'int|required',
            'collection' => 'nullable|int',
            'brand' => 'nullable|int',
            'options' => 'array',
            'code' => 'required|string|max:255',
            'count' => 'nullable|int|max:99999|min:0',
            'price' => 'nullable|int|max:1000000000',
            'bulk_price' => 'nullable|int|max:1000000000',
            'discount' => 'int|max:100|min:1|nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png'
        ];

        if ($ignore) {
            $rules['image'] .= 'nullable';
            $unique = ',' . $ignore;
        } else {
            $rules['image'] .= 'required';
            $unique = null;
        }

        if (empty($input['generate_url'])) {
            $rules['alias'] = 'required|is_url|string|unique:items,alias' . $unique . '|nullable';
        }

        if ($ignore) {
            $rules['image'] = 'image|nullable';
        }

        $messages = [
            'alias.required_with' => 'Введите название (' . $this->urlLang . ') чтобы сгенерировать URL.',
            'alias.required' => 'Введите URL или поставьте галочку "сгенерировать автоматически".',
            'title.*.required' => 'Введите название',
            'category.required' => 'Связать с категорией обязательно',
            'alias.is_url' => 'Неправильный URL.',
            'alias.unique' => 'URL уже используется.',
            'image.required' => 'Выберите изображение.',
            'image.image' => 'Неверное изображение.',
            'code.required' => 'Ввведите код товара',
            'discount.max' => 'Процент скидки от 1 до 100',
            'discount.min' => 'Процент скидки от 1 до 100',
            'discount.int' => 'Процент скидки от 1 до 100',
            'price.int' => 'Цена должен быть цифрой',
            'price.required' => 'Введите цену',
            'bulk_price.int' => 'Цена должна быть цифрой',
        ];

        return [$rules, $messages];
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function filters($id)
    {
        $data['item'] = Item::with(['category', 'criteria'])->where('id', $id)->firstOrFail();
        $data['title'] = t('Admin Sidebar.Filters') . " - " . $data['item']->title;
        /** @var Category $category */
        $category = Category::query()->where('id', $data['item']->category_id)->firstOrFail();

        $parentIds = $category->getNestedParents()->pluck('id')->toArray();
        $parentIds[] = $category->id;

        $data['filters'] = Filter::sort()->with('criteria')->whereHas('categories', function (Builder $query) use ($parentIds) {
            return $query->whereIn('categories.id', $parentIds);
        })->get();
        $data['colorFilters'] = ColorFilter::sort()->get();
        $data['selectedColorFilters'] = Item::query()->where('id', $id)->firstOrFail()->colorFilters()->pluck('color_filters.id')->toArray();

        $data['countryFilters'] = CountryFilter::sort()->get();
        $data['selectedCountryFilters'] = Item::query()->where('id', $id)->firstOrFail()->countryFilters()->pluck('country_filters.id')->toArray();

        return view('admin.pages.items.filters', $data);
    }

    /**
     * @param $id
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function syncFilters($id, Request $request)
    {
        /** @var Item $item */
        $item = Item::with('criteria')->where('id', $id)->firstOrFail();

        $this->validate($request, [
            'criteria' => 'nullable|array',
            'criteria.*' => 'nullable|exists:criteria,id'
        ]);

        $item->criteria()->sync(array_filter($request->input('criteria', [])));

        if ($colorFilters = $request->input('color_filters')) {
            $item->colorFilters()->sync($colorFilters);
        } else {
            $item->colorFilters()->detach();
        }

        if ($countryFilters = $request->input('country_filters')) {
            $item->countryFilters()->sync($countryFilters);
        } else {
            $item->countryFilters()->detach();
        }

        Notify::success(t('Admin action notify.success added'));

        return redirect()->back();
    }

    /**
     * @param $id
     * @return Application|Factory|View
     */
    public function recommended($id)
    {
        $data['item'] = Item::with('recommended')->where('id', $id)->firstOrFail();
        $data['title'] = t('Admin items.recommended') . " - " . $data['item']->title;
        $data['selectedRecommendedItems'] = Item::query()->where('id', $id)->firstOrFail()->recommended()->pluck('recommended_id')->toArray();

        $data['allItems'] = Item::query()->where('id','!=', $id)->get();

        return view('admin.pages.items.recommended', $data);
    }

    /**
     * @param $id
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function syncRecommended($id, Request $request)
    {
        /** @var Item $item */
        $item = Item::query()->where('id', $id)->firstOrFail();

        $this->validate($request, [
            'recommended' => 'nullable|array',
        ]);

        ItemRecommended::action($id, $request);

        Notify::success(t('Admin action notify.success added'));

        return redirect()->back();
    }
}
