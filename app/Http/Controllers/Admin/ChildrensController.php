<?php

namespace App\Http\Controllers\Admin;

use App\Constants\UserRole;
use App\Http\Requests\Children\ActiveChildrenRequest;
use App\Http\Requests\Children\DeleteChildrenRequest;
use App\Http\Requests\Children\StoreChildrenRequest;
use App\Http\Requests\Children\UpdateChildrenRequest;
use App\Models\Children;
use App\Models\Need;
use App\Models\Region;
use App\Models\User;
use App\Traits\InteractsWithSortable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Yajra\DataTables\Facades\DataTables;

class ChildrensController extends AdminBaseController
{
    use InteractsWithSortable;

    /**
     * @var string
     */
    protected $modelClass = Children::class;

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
        return response()
            ->view('admin.pages.childrens.index');
    }

    public function listPortion(Request $request)
    {
        //Session::put('sort', $request->get('start') ?? 0);
        $model = $this->model::query()->withCount(['gallery', 'files', 'videos']);

        $search = $request->input('search');

        $result = DataTables::eloquent($model)
            ->order(function (Builder $query) use ($request) {
                if ($request->has('order')) {
                    $order = Arr::first($request->input('order'));
                    $orderColumn = $request->input("columns.{$order['column']}.data");
                    $orderDir = $order['dir'];

                    $query->orderBy($orderColumn, $orderDir);
                } else {
                    $query->orderBy('id', 'desc');
                }
            })->filter(function (Builder $query) use ($search) {
                if (!empty($search['value'])) {
                    $query->where('title', 'LIKE', '%' . $search['value'] . '%');
                    $query->orWhere('created_at', 'LIKE', '%' . $search['value'] . '%');
                }
            });

        $result->editColumn('active', function (Children $item) {
            $checked = $item->active ? ' checked' : '';
            return '<label class="custom-toggle active-changer">
                    <input type="checkbox" value="'.$item->active.'" '.$checked.'>
                    <span class="custom-toggle-slider rounded-circle"></span>
                </label>';
        });

        $result->editColumn('title', function (Children $item) {
            return $item->title;
        });

        $result->editColumn('region_id', function (Children $item) {
            $region = Region::where('id', $item->region_id)->first();
            return $item->region_id = $region->title ?? '';
        });

        $result->editColumn('date_of_birth', function (Children $item) {
            return Carbon::parse($item->date_of_birth)->format('d-m-Y');//->calendar();
        });

        return $result->rawColumns(['active', 'region_id'])->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        $backUrl = route('admin.childrens.index');
        $regions = Region::where('active', 1)->sort()->get();
        $sponsors = User::where('role', UserRole::SPONSOR)->sort()->get();
        $needs = Need::where('parent_id', null)->with('children')->sort()->get();

        $imageSizes = $this->model::$imageSizes ?? null;
        $imageSize = '';
        if ($imageSizes) {
            $imageSize = ' (' . $imageSizes[0]['width'] . 'x' . $imageSizes[0]['height'] . ')';
        }

        return response()
            ->view('admin.pages.childrens.create', compact('edit', 'backUrl', 'imageSize', 'regions', 'sponsors', 'needs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreChildrenRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreChildrenRequest $request)
    {
        $id = $this->model->create($request->except('_token', '_method'))->id;
        $this->model->updateNeeds($request->get('needs'), $id);
        return redirect()
            ->route('admin.childrens.index');
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
        $regions = Region::where('active', 1)->sort()->get();
        $sponsors = User::where('role', UserRole::SPONSOR)->with('options')->get();
        $needs = Need::where('parent_id', null)->with('children')->sort()->get();

        $edit = true;
        $backUrl = route('admin.childrens.index');

        $imageSizes = $this->model::$imageSizes ?? null;
        $imageSize = '';
        if ($imageSizes) {
            $imageSize = ' (' . $imageSizes[0]['width'] . 'x' . $imageSizes[0]['height'] . ')';
        }

        return response()
            ->view('admin.pages.childrens.edit', compact('edit', 'backUrl', 'imageSize', 'item', 'regions', 'sponsors', 'needs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateChildrenRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateChildrenRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $item->updateNeeds($request->get('needs'), $item->id);
        $item->update($request->except('_token', '_method'));
        return redirect()
            ->route('admin.childrens.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteChildrenRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DeleteChildrenRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $result = ['success' => false];
        $item->delete();
        $result['success'] = true;

        return response()->json($result);
    }

    /**
     * Activate/Deactivate the specified resource from storage
     *
     * @param ActiveChildrenRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function active(ActiveChildrenRequest $request, int $id)
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
