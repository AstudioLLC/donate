<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Page\ActivePageRequest;
use App\Http\Requests\Page\DeletePageRequest;
use App\Http\Requests\Page\ForceDestroyPageRequest;
use App\Http\Requests\Page\RestorePageRequest;
use App\Http\Requests\Page\StorePageRequest;
use App\Http\Requests\Page\UpdatePageRequest;
use App\Models\Page;
use App\Traits\InteractsWithSortable;
use Illuminate\Http\Response;

class PagesController extends AdminBaseController
{
    use InteractsWithSortable;

    /**
     * @var string
     */
    protected $modelClass = Page::class;

    /**
     * @var mixed
     */
    protected $model;

    public function __construct()
    {
        parent::__construct();

        $this->model = new $this->modelClass;
    }

    /**
     * @param int|null $parentId
     * @return Response
     */
    public function index(int $parentId = null)
    {
        $items = $this->model::where('parent_id', $parentId)
            ->withCount(['childrenWithTrashed', 'children', 'gallery', 'files'])
            ->sort()
            ->get();

        return response()
            ->view('admin.pages.pages.index', compact('items', 'parentId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param int|null $parentId
     * @return Response
     */
    public function create(int $parentId = null)
    {
        $edit = false;
        $backUrl = route('admin.pages.index', ['parentId' => $parentId]);
        $imageSizes = $this->model::$imageSizes ?? null;
        $imageSize = '';
        if ($imageSizes) {
            $imageSize = ' (' . $imageSizes[0]['width'] . 'x' . $imageSizes[0]['height'] . ')';
        }
        $delimiter = '-';

        $iconSizes = $this->model::$iconSizes ?? null;
        $iconSize = '';
        if ($iconSizes) {
            $iconSize = ' (' . $iconSizes[0]['width'] . 'x' . $iconSizes[0]['height'] . ')';
        }

        $items = $this->model::where('parent_id', null)
            ->withCount(['childrenWithTrashed', 'children'])
            ->sort()
            ->get();

        return response()
            ->view('admin.pages.pages.create', compact('parentId', 'edit', 'backUrl', 'imageSize', 'iconSize', 'delimiter', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePageRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePageRequest $request)
    {
        $this->model->create($request->except('_token', '_method'));
        return redirect()
            ->route('admin.pages.index', ['parentId' => $request->get('parent_id')]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $item = $this->model::withTrashed()->findOrFail($id);
        $backUrl = route('admin.pages.index', ['parentId' => $item->parent_id]);

        return response()
            ->view('admin.pages.pages.show', compact('id', 'item', 'backUrl'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $item = $this->model::findOrFail($id);
        $parentId = $item->parent_id;
        $edit = true;
        $backUrl = route('admin.pages.index', ['parentId' => $parentId]);
        $delimiter = '-';
        $imageSizes = $this->model::$imageSizes ?? null;
        $imageSize = '';
        if ($imageSizes) {
            $imageSize = ' (' . $imageSizes[0]['width'] . 'x' . $imageSizes[0]['height'] . ')';
        }

        $iconSizes = $this->model::$iconSizes ?? null;
        $iconSize = '';
        if ($iconSizes) {
            $iconSize = ' (' . $iconSizes[0]['width'] . 'x' . $iconSizes[0]['height'] . ')';
        }

        $items = $this->model::where('parent_id', null)
            ->withCount(['childrenWithTrashed', 'children'])
            ->sort()
            ->get();

        return response()
            ->view('admin.pages.pages.edit', compact('parentId', 'edit', 'backUrl', 'imageSize', 'iconSize', 'delimiter', 'items', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdatePageRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePageRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $item->update($request->except('_token', '_method'));
        return redirect()
            ->route('admin.pages.index', ['parentId' => $request->get('parent_id')]);
    }

    /**
     * SoftDeletes the specified resource from storage
     *
     * @param DeletePageRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DeletePageRequest $request, int $id)
    {
        $item = $this->model::with('children')->findOrFail($id);
        $result = ['success' => false];
        if (!count($item->children)) {
            $item->delete();
            $result['success'] = true;
        }

        return response()->json($result);
    }

    /**
     * Activate/Deactivate the specified resource from storage
     *
     * @param ActivePageRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function active(ActivePageRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $result = ['success' => false];
        $item->active = $request->value;
        if ($item->save()) {
            $result['success'] = true;
        }

        return response()->json($result);
    }

    /**
     * Displays All trashed resources from storage
     *
     * @return Response
     */
    public function onlyTrashed()
    {
        $items = $this->model::onlyTrashed()->sort()->get();

        return response()
            ->view('admin.pages.pages.trash.index', compact('items'));
    }

    /**
     * Restores the specified resource from trash
     *
     * @param RestorePageRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore(RestorePageRequest $request, int $id)
    {
        $item = $this->model::onlyTrashed()->findOrFail($id);
        $result = ['success' => false];
        $item->restore();
        $result['success'] = true;

        return response()->json($result);
    }

    /**
     * ForceDeletes the specified resource from storage
     *
     * @param ForceDestroyPageRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function forceDestroy(ForceDestroyPageRequest $request, int $id)
    {
        $item = $this->model::withTrashed()->with('childrenWithTrashed')->findOrFail($id);
        $result = ['success' => false];
        if (!count($item->children)) {
            $item->forceDelete();
            $result['success'] = true;
        }

        return response()->json($result);
    }

}
