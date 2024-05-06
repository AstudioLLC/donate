<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Block\ActiveBlockRequest;
use App\Http\Requests\Block\DeleteBlockRequest;
use App\Http\Requests\Block\ForceDestroyBlockRequest;
use App\Http\Requests\Block\RestoreBlockRequest;
use App\Http\Requests\Block\StoreBlockRequest;
use App\Http\Requests\Block\UpdateBlockRequest;
use App\Models\Block;
use App\Traits\InteractsWithSortable;

class BlocksController extends AdminBaseController
{
    use InteractsWithSortable;

    /**
     * @var string
     */
    protected $modelClass = Block::class;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = $this->model::sort()
            ->get();

        return response()
            ->view('admin.pages.blocks.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        $backUrl = route('admin.blocks.index');

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

        return response()
            ->view('admin.pages.blocks.create', compact('edit', 'backUrl', 'imageSize', 'iconSize'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBlockRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreBlockRequest $request)
    {
        $this->model->create($request->except('_token', '_method'));
        return redirect()
            ->route('admin.blocks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
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
        $edit = true;
        $backUrl = route('admin.blocks.index');

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

        return response()
            ->view('admin.pages.blocks.edit', compact('item', 'edit', 'backUrl', 'imageSize', 'iconSize'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBlockRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateBlockRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $item->update($request->except('_token', '_method'));
        return redirect()
            ->route('admin.blocks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteBlockRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DeleteBlockRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $result = ['success' => false];
        if ($item->delete()) {
            $result['success'] = true;
        }

        return response()->json($result);
    }

    /**
     * Activate/Deactivate the specified resource from storage
     *
     * @param ActiveBlockRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function active(ActiveBlockRequest $request, int $id)
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
     * @return \Illuminate\Http\Response
     */
    public function onlyTrashed()
    {
        $items = $this->model::onlyTrashed()->sort()->get();

        return response()
            ->view('admin.pages.blocks.trash.index', compact('items'));
    }

    /**
     * Restores the specified resource from trash
     *
     * @param RestoreBlockRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore(RestoreBlockRequest $request, int $id)
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
     * @param ForceDestroyBlockRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function forceDestroy(ForceDestroyBlockRequest $request, int $id)
    {
        $item = $this->model::withTrashed()->findOrFail($id);
        $result = ['success' => false];
        if ($item->forceDelete()) {
            $result['success'] = true;
        }

        return response()->json($result);
    }
}
