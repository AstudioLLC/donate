<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\HomeBlock\ActiveHomeBlockRequest;
use App\Http\Requests\HomeBlock\DeleteHomeBlockRequest;
use App\Http\Requests\HomeBlock\ForceDestroyHomeBlockRequest;
use App\Http\Requests\HomeBlock\RestoreHomeBlockRequest;
use App\Http\Requests\HomeBlock\StoreHomeBlockRequest;
use App\Http\Requests\HomeBlock\UpdateHomeBlockRequest;
use App\Models\HomeBlock;
use App\Traits\InteractsWithSortable;

class HomeBlocksController extends AdminBaseController
{
    use InteractsWithSortable;

    /**
     * @var string
     */
    protected $modelClass = HomeBlock::class;

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
            ->view('admin.pages.home_blocks.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        $backUrl = route('admin.home_blocks.index');
        $keys = $this->model::$keys ?? null;
        $imageSizes = $this->model::$imageSizes ?? null;
        $imageSize = '';
        if ($imageSizes) {
            $imageSize = ' (' . $imageSizes[0]['width'] . 'x' . $imageSizes[0]['height'] . ')';
        }

        return response()
            ->view('admin.pages.home_blocks.create', compact('edit', 'backUrl', 'imageSize', 'keys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreHomeBlockRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreHomeBlockRequest $request)
    {
        $this->model->create($request->except('_token', '_method'));
        return redirect()
            ->route('admin.home_blocks.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
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
        $item->count = json_decode($item->count, true);
        $edit = true;
        $backUrl = route('admin.home_blocks.index');
        $keys = $this->model::$keys ?? null;

        if ($id == 1) {
            $imageSmallSizes = $this->model::$imageFirstSmallSizes ?? null;
            $imageBigSizes = $this->model::$imageFirstBigSizes ?? null;
        } else {
            $imageSmallSizes = $this->model::$imageSecondSmallSizes ?? null;
            $imageBigSizes = $this->model::$imageSecondBigSizes ?? null;
        }

        $imageSmallSize = '';
        if ($imageSmallSizes) {
            $imageSmallSize = ' (' . $imageSmallSizes[0]['width'] . 'x' . $imageSmallSizes[0]['height'] . ')';
        }

        $imageBigSize = '';
        if ($imageBigSizes) {
            $imageBigSize = ' (' . $imageBigSizes[0]['width'] . 'x' . $imageBigSizes[0]['height'] . ')';
        }

        return response()
            ->view('admin.pages.home_blocks.edit', compact('item', 'edit', 'backUrl', 'imageBigSize', 'imageSmallSize', 'keys'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateHomeBlockRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateHomeBlockRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $item->update($request->except('_token', '_method'));
        return redirect()
            ->route('admin.home_blocks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteHomeBlockRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DeleteHomeBlockRequest $request,int $id)
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
     * @param ActiveHomeBlockRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function active(ActiveHomeBlockRequest $request, int $id)
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function onlyTrashed()
    {
        return redirect()
            ->route('admin.home_blocks.index');

        /*$items = $this->model::onlyTrashed()->sort()->get();

        return response()
            ->view('admin.pages.home_blocks.trash.index', compact('items'));*/
    }

    /**
     * Restores the specified resource from trash
     *
     * @param RestoreHomeBlockRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore(RestoreHomeBlockRequest $request, int $id)
    {
        return redirect()
            ->route('admin.home_blocks.index');
        /*$item = $this->model::onlyTrashed()->findOrFail($id);
        $result = ['success' => false];
        $item->restore();
        $result['success'] = true;

        return response()->json($result);*/
    }

    /**
     * ForceDeletes the specified resource from storage
     *
     * @param ForceDestroyHomeBlockRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDestroy(ForceDestroyHomeBlockRequest $request, int $id)
    {
        return redirect()
            ->route('admin.home_blocks.index');
        /*$item = $this->model::withTrashed()->findOrFail($id);
        $result = ['success' => false];
        if ($item->forceDelete()) {
            $result['success'] = true;
        }

        return response()->json($result);*/
    }
}
