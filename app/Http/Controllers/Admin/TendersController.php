<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Tender\ActiveTenderRequest;
use App\Http\Requests\Tender\DeleteTenderRequest;
use App\Http\Requests\Tender\StoreTenderRequest;
use App\Http\Requests\Tender\UpdateTenderRequest;
use App\Models\Tender;
use App\Models\Page;
use App\Traits\InteractsWithSortable;

class TendersController extends AdminBaseController
{
    use InteractsWithSortable;

    /**
     * @var string
     */
    protected $modelClass = Tender::class;

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
            ->view('admin.pages.tenders.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        $backUrl = route('admin.tenders.index');
        $pages = Page::where('parent_id', 41)->orWhere('static','our_grand_programs')
            ->with('children')
            ->sort()
            ->get();
        return response()
            ->view('admin.pages.tenders.create', compact('edit',  'pages','backUrl'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTenderRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreTenderRequest $request)
    {
        $this->model->create($request->except('_token', '_method'));
        return redirect()
            ->route('admin.tenders.index');
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
        $backUrl = route('admin.tenders.index');
        $pages = Page::where('parent_id', 41)->orWhere('static','our_grand_programs')
            ->with('children')
            ->sort()
            ->get();

        return response()
            ->view('admin.pages.tenders.edit', compact('item',  'pages','edit','backUrl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTenderRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateTenderRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $item->update($request->except('_token', '_method'));
        return redirect()
            ->route('admin.tenders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteTenderRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DeleteTenderRequest $request, int $id)
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
     * @param ActiveTenderRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function active(ActiveTenderRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $result = ['success' => false];
        $item->active = $request->value;
        if ($item->save()) {
            $result['success'] = true;
        }

        return response()->json($result);
    }

}
