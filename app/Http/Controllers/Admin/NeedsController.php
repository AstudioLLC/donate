<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Need\ActiveNeedRequest;
use App\Http\Requests\Need\DeleteNeedRequest;
use App\Http\Requests\Need\StoreNeedRequest;
use App\Http\Requests\Need\UpdateNeedRequest;
use App\Models\Need;
use App\Traits\InteractsWithSortable;

class NeedsController extends AdminBaseController
{
    use InteractsWithSortable;

    /**
     * @var string
     */
    protected $modelClass = Need::class;

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
     * @param int|null $parentId
     * @return \Illuminate\Http\Response
     */
    public function index(int $parentId = null)
    {
        $items = $this->modelClass::where('parent_id', $parentId)
            ->withCount(['children'])
            ->sort()
            ->get();

        return response()
            ->view('admin.pages.needs.index', compact('items', 'parentId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $parentId = null)
    {
        $edit = false;
        $backUrl = route('admin.needs.index', ['parentId' => $parentId]);

        return response()
            ->view('admin.pages.needs.create', compact('parentId', 'edit', 'backUrl'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreNeedRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreNeedRequest $request)
    {
        $this->model->create($request->except('_token', '_method'));
        return redirect()
            ->route('admin.needs.index', ['parentId' => $request->get('parent_id')]);
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
        $item = $this->modelClass::findOrFail($id);
        $parentId = $item->parent_id;
        $edit = true;
        $backUrl = route('admin.needs.index', ['parentId' => $parentId]);

        return response()
            ->view('admin.pages.needs.edit', compact('parentId', 'edit', 'backUrl', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateNeedRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateNeedRequest $request, int $id)
    {
        $item = $this->modelClass::findOrFail($id);
        $item->update($request->except('_token', '_method'));
        return redirect()
            ->route('admin.needs.index', ['parentId' => $request->get('parent_id')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteNeedRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DeleteNeedRequest $request, int $id)
    {
        $item = $this->modelClass::with('children')->findOrFail($id);
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
     * @param ActiveNeedRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function active(ActiveNeedRequest $request, int $id)
    {
        $item = $this->modelClass::findOrFail($id);
        $result = ['success' => false];
        $item->active = $request->value;
        if ($item->save()) {
            $result['success'] = true;
        }

        return response()->json($result);
    }
}
