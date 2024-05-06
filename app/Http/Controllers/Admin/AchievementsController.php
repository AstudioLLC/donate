<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Achievement\ActiveAchievementRequest;
use App\Http\Requests\Achievement\DeleteAchievementRequest;
use App\Http\Requests\Achievement\StoreAchievementRequest;
use App\Http\Requests\Achievement\UpdateAchievementRequest;
use App\Models\Achievement;
use App\Models\Page;
use App\Traits\InteractsWithSortable;

class AchievementsController extends AdminBaseController
{
    use InteractsWithSortable;

    /**
     * @var string
     */
    protected $modelClass = Achievement::class;

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
            ->view('admin.pages.achievements.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        $backUrl = route('admin.achievements.index');
        $pages = Page::where('parent_id', 41)->orWhere('static','our_grand_programs')
            ->with('children')
            ->sort()
            ->get();
        return response()
            ->view('admin.pages.achievements.create', compact('edit',  'pages','backUrl'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreAchievementRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreAchievementRequest $request)
    {
        $this->model->create($request->except('_token', '_method'));
        return redirect()
            ->route('admin.achievements.index');
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
        $backUrl = route('admin.achievements.index');
        $pages = Page::where('parent_id', 41)->orWhere('static','our_grand_programs')
            ->with('children')
            ->sort()
            ->get();

        return response()
            ->view('admin.pages.achievements.edit', compact('item',  'pages','edit','backUrl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateAchievementRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateAchievementRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $item->update($request->except('_token', '_method'));
        return redirect()
            ->route('admin.achievements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteAchievementRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DeleteAchievementRequest $request, int $id)
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
     * @param ActiveAchievementRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function active(ActiveAchievementRequest $request, int $id)
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
