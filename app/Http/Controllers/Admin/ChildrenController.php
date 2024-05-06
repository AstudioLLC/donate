<?php

namespace App\Http\Controllers\Admin;

use App\Constants\UserRole;
use App\Exports\ChildrenExport;
use App\Http\Requests\Children\ActiveChildrenRequest;
use App\Http\Requests\Children\DeleteChildrenRequest;
use App\Http\Requests\Children\ForceDestroyChildrenRequest;
use App\Http\Requests\Children\RestoreChildrenRequest;
use App\Http\Requests\Children\StoreChildrenRequest;
use App\Http\Requests\Children\UpdateChildrenRequest;
use App\Models\Chat;
use App\Models\Children;
use App\Models\Need;
use App\Models\Region;
use App\Models\User;
use App\Traits\InteractsWithSortable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class ChildrenController extends AdminBaseController
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
        $unread = 'unread';
        $unread_messages = Chat::where('message_from',1)->where('admin_is_read', 0)->get();
        $count = Children::all()->count();
        return response()
            ->view('admin.pages.children.index',compact('unread','unread_messages','count'));
    }

    public function exportExcel()
    {
        $filename = 'children-' . date('d-m-Y') .  '.xlsx';
        try {
            return Excel::download(new ChildrenExport, $filename, \Maatwebsite\Excel\Excel::XLSX);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }
    public function addUnreadSession(Request $request)
    {
        $unread = $request->get('unread');
        Session::flush();
        Session::put('unread', $unread ?? 0);

        return true;
    }
    public function listPortion(Request $request)
    {
        //Session::put('sort', $request->get('start') ?? 0);
        if (Session::get('unread')) {

            $model = $this->model::query()->withCount(['gallery', 'files', 'videos', 'reports'])
                ->whereHas('unread', function ($q) {
                    $q
                        ->where('chat.admin_is_read', false)
                            ->where('chat.message_from', true)
                                ->orderBy('id', 'desc')
                                    ->groupBy('title');
                });
        }else{
            $model = $this->model::query()->orderBy('created_at','desc')->withCount(['gallery', 'files', 'videos', 'reports']);

        }

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
                    $query->orWhere('child_id', 'LIKE', '%' . $search['value'] . '%');
                    $query->orWhere('id', 'LIKE', '%' . $search['value'] . '%');
                    $query->orWhere('created_at', 'LIKE', '%' . $search['value'] . '%');
                    $query->orwhereHas('region', function($q) use ($search){
                        $q->where('title', 'LIKE', '%' . $search['value'] . '%');
                    });
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

        $result->editColumn('sponsor_id', function (Children $item) {
            $checked = isset($item->sponsor->name) ? ' checked' : '';
            $active = isset($item->sponsor->name) ? 1 : 0;
            return '<label class="custom-toggle">
                    <input type="checkbox" disabled value="'.$active.'" '.$checked.'>
                    <span class="custom-toggle-slider rounded-circle"></span>
                </label>';
            //return $item->sponsor->name ?? '';
        });

        $result->editColumn('created_at', function (Children $item) {
            if ($item->updated_at) {
                return $item->updated_at->format('d/m/Y');
            } else {
                return $item->created_at->format('d/m/Y');
            }
        });

        return $result->rawColumns(['active', 'sponsor_id', 'region_id'])->toArray();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        $backUrl = route('admin.children.index');
        $regions = Region::sort()->get();
        $sponsors = User::where('role', UserRole::SPONSOR)->sort()->get();
        $needs = Need::where('parent_id', null)->with('children')->sort()->get();

        $imageSizes = $this->model::$imageSizes ?? null;
        $imageSize = '';
        if ($imageSizes) {
            $imageSize = ' (' . $imageSizes[0]['width'] . 'x' . $imageSizes[0]['height'] . ')';
        }

        return response()
            ->view('admin.pages.children.create', compact('edit', 'backUrl', 'imageSize', 'regions', 'sponsors', 'needs'));
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
        // Default chat update for specific child
        if ($request->sponsor_id !== null) {
            DB::table('chat')->insert([
                'children_id' => $id,
                'sponsor_id' => $request->sponsor_id
            ]);
            DB::table('user_options')->where('user_id',$request->sponsor_id)
                ->update(['sponsor_id' => \Illuminate\Support\Facades\DB::raw("REPLACE(sponsor_id,  'TS_', 'LS_')")]);
            DB::table('user_options')->where('user_id',$request->sponsor_id)
                ->update(['sponsor_id' => \Illuminate\Support\Facades\DB::raw("REPLACE(sponsor_id,  'AA_', 'LS_')")]);
        }
        return redirect()
            ->route('admin.children.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $item = $this->model::findOrFail($id);
        $regions = Region::where('active', 1)->sort()->get();
        $sponsors = User::where('role', UserRole::SPONSOR)->with('options')->get();
        $needs = Need::where('parent_id', null)->with('children')->sort()->get();

        $edit = false;
        $backUrl = route('admin.children.index');

        $imageSizes = $this->model::$imageSizes ?? null;
        $imageSize = '';
        if ($imageSizes) {
            $imageSize = ' (' . $imageSizes[0]['width'] . 'x' . $imageSizes[0]['height'] . ')';
        }
        return response()
            ->view('admin.pages.children.show', compact( 'item','edit','backUrl', 'imageSize', 'regions', 'sponsors', 'needs'));

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
        $regions = Region::sort()->get();
        $sponsors = User::where('role', UserRole::SPONSOR)->with('options')->get();
        $needs = Need::where('parent_id', null)->with('children')->sort()->get();

        $edit = true;
        $backUrl = route('admin.children.index');

        $imageSizes = $this->model::$imageSizes ?? null;
        $imageSize = '';
        if ($imageSizes) {
            $imageSize = ' (' . $imageSizes[0]['width'] . 'x' . $imageSizes[0]['height'] . ')';
        }

        return response()
            ->view('admin.pages.children.edit', compact('edit', 'backUrl', 'imageSize', 'item', 'regions', 'sponsors', 'needs'));
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
        if ($request->sponsor_id !== null) {
            DB::table('chat')->where('children_id', $id)->updateOrInsert([
                'children_id' => $id,
                'sponsor_id' => $request->sponsor_id
            ]);
            DB::table('user_options')->where('user_id',$request->sponsor_id)
                ->update(['sponsor_id' => \Illuminate\Support\Facades\DB::raw("REPLACE(sponsor_id,  'TS_', 'LS_')")]);
            DB::table('user_options')->where('user_id',$request->sponsor_id)
                ->update(['sponsor_id' => \Illuminate\Support\Facades\DB::raw("REPLACE(sponsor_id,  'AA_', 'LS_')")]);
        }
        $item->updateNeeds($request->get('needs'), $item->id);
        $item->update($request->except('_token', '_method'));

        return redirect()
            ->route('admin.children.index');
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


    /**
     * Restores the specified resource from trash
     *
     * @param RestoreChildrenRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore(RestoreChildrenRequest $request, int $id)
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
     * @param ForceDestroyChildrenRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function forceDestroy(ForceDestroyChildrenRequest $request, int $id)
    {
        $item = $this->model::withTrashed()->findOrFail($id);
        $result = ['success' => false];
        if ($item->forceDelete()) {
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
        $items = $this->model::onlyTrashed()->withCount(['gallery', 'files', 'videos', 'reports'])->with('region')->sort()->get();

        return response()
            ->view('admin.pages.children.trash.index', compact('items'));
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $items = $this->model->onlyTrashed()->where('title','like','%' .$search. '%')->orWhere('child_id','like','%' .$search. '%')->get();
        return view('admin.pages.children.trash.index',compact('items'));
    }
}
