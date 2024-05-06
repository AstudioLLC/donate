<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Fundraiser\ActiveFundraiserRequest;
use App\Http\Requests\Fundraiser\DeleteFundraiserRequest;
use App\Http\Requests\Fundraiser\ForceDestroyFundraiserRequest;
use App\Http\Requests\Fundraiser\RestoreFundraiserRequest;
use App\Http\Requests\Fundraiser\StoreFundraiserRequest;
use App\Http\Requests\Fundraiser\UnlimitFundraiserRequest;
use App\Http\Requests\Fundraiser\UpdateFundraiserRequest;
use App\Models\Children;
use App\Models\Fundraiser;
use App\Traits\InteractsWithSortable;
use Illuminate\Http\Request;

class FundraisersController extends AdminBaseController
{
    use InteractsWithSortable;

    /**
     * @var string
     */
    protected $modelClass = Fundraiser::class;

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
            ->view('admin.pages.fundraisers.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        $backUrl = route('admin.fundraisers.index');
        $children = Children::where('active', 1)->sort()->get();

        $imageSmallSizes = $this->model::$imageSmallSizes ?? null;
        $imageSmallSize = '';
        if ($imageSmallSizes) {
            $imageSmallSize = ' (' . $imageSmallSizes[0]['width'] . 'x' . $imageSmallSizes[0]['height'] . ')';
        }

        $imageBigSizes = $this->model::$imageBigSizes ?? null;
        $imageBigSize = '';
        if ($imageBigSizes) {
            $imageBigSize = ' (' . $imageBigSizes[0]['width'] . 'x' . $imageBigSizes[0]['height'] . ')';
        }

        return response()
            ->view('admin.pages.fundraisers.create', compact('edit', 'backUrl', 'imageSmallSize', 'imageBigSize', 'children'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreFundraiserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreFundraiserRequest $request)
    {
        $this->model->create($request->except('_token', '_method'));
        return redirect()
            ->route('admin.fundraisers.index');
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

        $edit = true;
        $backUrl = route('admin.fundraisers.index');
        $children = Children::where('active', 1)->sort()->get();

        $imageSmallSizes = $this->model::$imageSmallSizes ?? null;
        $imageSmallSize = '';
        if ($imageSmallSizes) {
            $imageSmallSize = ' (' . $imageSmallSizes[0]['width'] . 'x' . $imageSmallSizes[0]['height'] . ')';
        }

        $imageBigSizes = $this->model::$imageBigSizes ?? null;
        $imageBigSize = '';
        if ($imageBigSizes) {
            $imageBigSize = ' (' . $imageBigSizes[0]['width'] . 'x' . $imageBigSizes[0]['height'] . ')';
        }

        return response()
            ->view('admin.pages.fundraisers.edit', compact('edit', 'backUrl', 'imageSmallSize', 'imageBigSize', 'item', 'children'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateFundraiserRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateFundraiserRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $item->update($request->except('_token', '_method'));
        return redirect()
            ->route('admin.fundraisers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteFundraiserRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DeleteFundraiserRequest $request, int $id)
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
     * @param ActiveFundraiserRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function active(ActiveFundraiserRequest $request, int $id)
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
     * Set to unlimit/non unlimit the specified resource from storage
     *
     * @param UnlimitFundraiserRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function unlimit(UnlimitFundraiserRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $result = ['success' => false];
        $item->unlimit = $request->value;
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
            ->view('admin.pages.fundraisers.trash.index', compact('items'));
    }

    /**
     * Restores the specified resource from trash
     *
     * @param RestoreFundraiserRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore(RestoreFundraiserRequest $request, int $id)
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
     * @param ForceDestroyFundraiserRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function forceDestroy(ForceDestroyFundraiserRequest $request, int $id)
    {
        $item = $this->model::withTrashed()->findOrFail($id);
        $result = ['success' => false];
        if ($item->forceDelete()) {
            $result['success'] = true;
        }

        return response()->json($result);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $items = $this->model->where('title','like','%' .$search. '%')->get();
        return view('admin.pages.fundraisers.index',compact('items'));
    }
}
