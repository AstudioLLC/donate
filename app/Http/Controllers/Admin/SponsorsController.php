<?php

namespace App\Http\Controllers\Admin;

use App\Constants\UserRole;
use App\Exports\SponsorsExport;
use App\Http\Requests\Sponsor\ActiveSponsorRequest;
use App\Http\Requests\Sponsor\DeleteSponsorRequest;
use App\Http\Requests\Sponsor\ForceDestroySponsorRequest;
use App\Http\Requests\Sponsor\RestoreSponsorRequest;
use App\Http\Requests\Sponsor\SelectTypeSponsorRequest;
use App\Http\Requests\Sponsor\StoreSponsorRequest;
use App\Http\Requests\Sponsor\UpdateSponsorRequest;
use App\Models\Children;
use App\Models\Country;
use App\Models\Region;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\Facades\DataTables;

class SponsorsController extends AdminBaseController
{
    /**
     * @var string
     */
    protected $modelClass = User::class;

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

        $ts = 'ts';
        $ls = 'ls';
        $items = User::all();
        return response()
            ->view('admin.pages.sponsors.index',compact('ts','ls','items'));
    }

    public function exportExcel()
    {
        $filename = 'sponsors-' . date('d-m-Y') .  '.xlsx';
        try {
            return Excel::download(new SponsorsExport, $filename, \Maatwebsite\Excel\Excel::XLSX);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function addTsSession(Request $request)
    {
        $ts = $request->get('ts');
        Session::flush();
        Session::put('ts', $ts ?? 0);

        return true;
    }
    public function addLsSession(Request $request)
    {
        $ls = $request->get('ls');
        Session::flush();
        Session::put('ls', $ls ?? 0);

        return true;
    }
    public function listPortion(Request $request)
    {

        if (Session::get('ts')) {
            $model = $this->model::query()
                ->with('options')->whereHas('options',function ($q){
                    $q->where('sponsor_id','like','%' . 'TS'. '%')->orWhere('sponsor_id','like','%' . 'AA'. '%');
                });

        }elseif (Session::get('ls')) {
        $model = $this->model::query()
            ->with('options')->whereHas('options',function ($q){
                $q->where('sponsor_id','like','%' . 'LS'. '%');
            });

        }
        else {
            $model = $this->model::query()
                ->where('role', UserRole::SPONSOR)->with('options');
        }
        $search = $request->input('search');

        $result = DataTables::eloquent($model)
            ->order(function (Builder $query) use ($request) {
                if ($request->has('order')) {
                    $order = Arr::first($request->input('order'));
                    $orderColumn = $request->input("columns.{$order['column']}.data");
                    $orderDir = $order['dir'];

                    $query->orderBy($orderColumn, $orderDir);
                }
                $query->orderBy('watched', 'asc');
                $query->orderBy('id', 'desc');
            })->filter(function (Builder $query) use ($search) {
                if (!empty($search['value'])) {
                    $query->whereHas('options', function ($subquery) use ($search) {
                        $subquery->where('user_options.sponsor_id', 'LIKE', '%' . $search['value'] . '%');
                    });
                    $query->orWhere('name', 'LIKE', '%' . $search['value'] . '%');
                    $query->orWhere('email', 'LIKE', '%' . $search['value'] . '%');
                    $query->orWhere('created_at', 'LIKE', '%' . $search['value'] . '%');
                }
            });

        $result->editColumn('active', function (User $item) {
            $sponsorId = $item->options->sponsor_id ?? null;
            $sponsorId_type = Arr::first(explode('_', $sponsorId));
            if ($sponsorId_type == 'LS') {
                $checked = ' checked';
                $class = '';
                $on = 'LS';
                $off = '';
            } elseif ($sponsorId_type == 'TS') {
                $checked = 'checked';
                $class = 'checked';
                $on = 'TS';
                $off = 'TS';
            } else {
                $checked = 'checked';
                $class = '';
                $on = '';
                $off = '';
            }

            return '<label class="custom-toggle">
                        <input type="checkbox" ' . $checked . ' class="' . $class . '">
                        <span class="custom-toggle-slider rounded-circle" data-label-off="' . $off . '" data-label-on="' . $on . '"></span>
                    </label>';
        });

        $result->editColumn('select_type', function (User $item) {
            $select_type = $item->select_type ?? null;
            $selected = 'selected';
            if ($select_type == 'LS') {
                $value = 'LS';

            } elseif ($select_type == 'TS') {
                $value = 'TS';
            }elseif ($select_type == 'P-LS') {
                $value = 'P-LS';
            }elseif ($select_type == 'P-TS') {
                $value = 'P-TS';
            }
            else {
                $value = 'Choose type..';
                $name = 'Choose type..';
            }


            return '<select name="select_type" class="ts-select">

                        <option disabled class="d-none" '. $selected .' value="'.$value.'">'.$value.'</option>

                        <option value="LS">LS</option>
                        <option value="TS">TS</option>
                        <option value="P-LS">P-LS</option>
                        <option value="P-TS">P-TS</option>
                        </select>
                    ';
        });

        $result->editColumn('created_at', function (User $item) {
            return $item->created_at->format('d/m/Y');//->calendar();
        });

        $result->editColumn('sponsor_id', function (User $item) {
            $sponsor = [
                $item->options->sponsor_id ?? '',
                $item->email ?? '',
                $item->name ?? ''
            ];
            $sponsor = implode("</br>", $sponsor);
            return $sponsor;
        });

        return $result->rawColumns(['active','select_type','sponsor_id'])->toArray();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $edit = false;
        $backUrl = route('admin.sponsors.index');
        $regions = Region::where('active', 1)->sort()->get();
        $countries = Country::sort()->get();
        $role = UserRole::SPONSOR;

        return response()
            ->view('admin.pages.sponsors.create', compact('edit', 'backUrl', 'countries', 'regions', 'role'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreSponsorRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreSponsorRequest $request)
    {
        $request->merge([
            'password' => Hash::make($request->get('password'))
        ]);
        $id = $this->model->create($request->except('_token', '_method'))->id;
        $this->model->updateOrCreateOptions($request->all(), $id);

        return redirect()
            ->route('admin.sponsors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $item = $this->model::findOrFail($id);
        if ($item->watched == 0) {
            $item->update(['watched' => 1]);
        }
        $regions = Region::where('active', 1)->sort()->get();
        $countries = Country::sort()->get();
        $role = UserRole::SPONSOR;
        $childrens = Children::where(['sponsor_id' => $item->id, 'active'=> 1])
            ->with(['gallery', 'files', 'videos'])
            ->sort()
            ->get();
        $edit = false;
        $backUrl = route('admin.sponsors.index');

        return response()
            ->view('admin.pages.sponsors.show', compact('edit' ,'childrens','backUrl', 'regions', 'countries', 'item', 'role'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $item = $this->model::findOrFail($id);
        if ($item->watched == 0) {
            $item->update(['watched' => 1]);
        }
        $regions = Region::where('active', 1)->sort()->get();
        $countries = Country::sort()->get();
        $role = UserRole::SPONSOR;

        $edit = true;
        $backUrl = route('admin.sponsors.index');

        return response()
            ->view('admin.pages.sponsors.edit', compact('edit', 'backUrl', 'regions', 'countries', 'item', 'role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateSponsorRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateSponsorRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $item->update($request->except('_token', '_method'));
        $item->updateOrCreateOptions($request->all(), $id);

        return redirect()
            ->route('admin.sponsors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteSponsorRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DeleteSponsorRequest $request, int $id)
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
     * @param ActiveSponsorRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function active(ActiveSponsorRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $result = ['success' => false];
        $item->active = $request->value;
        if ($item->save()) {
            $result['success'] = true;
        }

        return response()->json($result);
    }

    public function selecttype(SelectTypeSponsorRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $result = ['success' => false];
        $item->select_type = $request->select_type;

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
        $items = $this->model::onlyTrashed()->where('role', UserRole::SPONSOR)->get();

        return response()
            ->view('admin.pages.sponsors.trash.index', compact('items'));
    }

    /**
     * Restores the specified resource from trash
     *
     * @param RestoreSponsorRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore(RestoreSponsorRequest $request, int $id)
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
     * @param ForceDestroySponsorRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function forceDestroy(ForceDestroySponsorRequest $request, int $id)
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
        $items = $this->model::onlyTrashed()->where('email','like','%' .$search. '%')
                    ->orWhere('name', 'LIKE', '%' . $search . '%')
            ->get();
        return view('admin.pages.sponsors.trash.index',compact('items'));
    }
}
