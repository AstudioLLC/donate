<?php

namespace App\Http\Controllers\Admin;

use App\Exports\DonationsExport;
use App\Http\Requests\Donation\BindingDonationRequest;
use App\Http\Requests\Donation\DeleteDonationRequest;
use App\Http\Requests\Donation\ForceDestroyDonationRequest;
use App\Http\Requests\Donation\RestoreDonationRequest;
use App\Http\Requests\Donation\StatusDonationRequest;
use App\Http\Requests\Donation\UpdateAjaxRequest;
use App\Http\Requests\Donation\UpdateDonationRequest;
use App\Models\Binding;
use App\Models\Children;
use App\Models\Donation;
use App\Models\User;
use App\Services\Support\Str;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\Console\Input\Input;
use Yajra\DataTables\Facades\DataTables;

class DonationsController extends AdminBaseController
{
    /**
     * @var string
     */
    protected $modelClass = Donation::class;

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
    public function index(Request $request)
    {

        $oldest = Donation::oldest('created_at')->first();
        if ($oldest) {
            $oldest = $oldest->created_at->format('Y');
        }elseif($oldest && $request->get('month'))
        {
            $oldest = $oldest->created_at->format('F');
        }
        $date = date('Y');
        $month = '1';
        $gift = '1';
        $fundraiser = '1';
        $failed = '1';
        $child = '1';
        return response()
            ->view('admin.pages.donations.index', compact('oldest','child','gift', 'fundraiser','failed', 'date','month'));
    }

    public function addYearFilterToSession(Request $request)
    {
        $year = $request->get('year');
        if ($year == 0){
        Session::flush();
        }
        Session::put('year', $year ?? 0);

        return true;

    }

    public function addChildToSession(Request $request)
    {
        $child = $request->get('child');
        Session::forget([
            'month',
            'gift',
            'fundraiser',
            'failed'
        ]);
        Session::put('child', $child ?? 0);
        return true;

    }
    public function addMonthFilterToSession(Request $request)
    {
        $month = $request->get('month');
        Session::forget([
            'child',
            'gift',
            'fundraiser',
            'failed'
        ]);
        Session::put('month', $month ?? 0);

        return true;

    }
    public function addGiftFilterToSession(Request $request)
    {
        $gift = $request->get('gift');
        Session::forget([
            'month',
            'child',
            'fundraiser',
            'failed'
        ]);
        Session::put('gift', $gift ?? 0);
        return true;

    }
    public function addFundraiserToSession(Request $request)
    {
        $fundraiser = $request->get('fundraiser');
        Session::forget([
            'month',
            'gift',
            'child',
            'failed'
        ]);        Session::put('fundraiser', $fundraiser ?? 0);

        return true;

    }
    public function addFailedToSession(Request $request)
    {
        $failed = $request->get('failed');
        Session::flush();
        Session::put('failed', $failed ?? 0);

        return true;

    }
    public function exportExcel()
    {
        if (Session::get('year')) {
            $model = $this->model::with(['children', 'sponsor', 'fundraiser', 'gift'])->whereYear('created_at', Session::get('year'))
                ->where(function($child_session){
                    if(Session::exists(['child','year']))
                    {
                        $child_session->whereNotNull('children_id')->where('status',true);
                    }
                })
                ->where(function($fundraiser_session){
                    if(Session::exists(['fundraiser','year']))
                    {
                        $fundraiser_session->whereNotNull('fundraiser_id')->where('status',true);
                    }
                })
                ->where(function($gift_session){
                    if(Session::exists(['gift','year']))
                    {
                        $gift_session->whereNotNull('gift_id')->where('status',true);
                    }
                })
                ->where(function($month_session){
                    if(Session::exists(['month','year']))
                    {
                        $month_session->where('project_type','like','%' . 'DONATЕ FOR MOST URGENT NEEDS'. '%')->where('status',true);
                    }
                })
                ->where(function($failed_session){
                    if(Session::exists(['failed','year']))
                    {
                        $failed_session->where('status',false);
                    }
                })
            ;
            $filename = 'donations-' . Session::get('year') . '.xlsx';
        }elseif (Session::get('month')) {
            $model = $this->model::with(['children', 'sponsor', 'fundraiser', 'gift'])->where('status',true)->where('project_type','like','%' . 'DONATЕ FOR MOST URGENT NEEDS'. '%');
            $filename = 'donations-' . Session::get('month') .  '.xlsx';
        }
        elseif (Session::get('gift')) {
            $model = $this->model::with(['children', 'sponsor', 'fundraiser', 'gift'])->where('status',true)->whereNotNull('gift_id');
            $filename = 'donations-gifts.xlsx';
        }
        elseif (Session::get('fundraiser')) {
            $model = $this->model::with(['children', 'sponsor', 'fundraiser', 'gift'])->where('status',true)->whereNotNull('fundraiser_id');
            $filename = 'donations-fundraiser.xlsx';
        }
        elseif (Session::get('failed')) {
            $model = $this->model::with(['children', 'sponsor', 'fundraiser', 'gift'])->where('status',false);
            $filename = 'donations-failed.xlsx';
        }
        elseif (Session::get('child')) {
            $model = $this->model::with(['children', 'sponsor', 'fundraiser', 'gift'])->where('status',true)->whereNotNull('children_id');
            $filename = 'donations-with-sponsorship.xlsx';
        }
        else {
            $model = $this->model::with(['children', 'sponsor', 'fundraiser', 'gift'])->where('status',true);
            $filename = 'donations-all.xlsx';
        }

        try {
            return Excel::download(new DonationsExport($model), $filename, \Maatwebsite\Excel\Excel::XLSX);
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function listPortion(Request $request)
    {

        if (Session::get('year')) {
            $model = $this->model::with(['children', 'sponsor', 'fundraiser', 'gift'])->whereYear('created_at', Session::get('year'))
                ->where(function($child_session){
                    if(Session::exists(['child','year']))
                    {
                        $child_session->whereNotNull('children_id')->where('status',true);
                    }
                })
                ->where(function($fundraiser_session){
                    if(Session::exists(['fundraiser','year']))
                    {
                        $fundraiser_session->whereNotNull('fundraiser_id')->where('status',true);
                    }
                })
                ->where(function($gift_session){
                    if(Session::exists(['gift','year']))
                    {
                        $gift_session->whereNotNull('gift_id')->where('status',true);
                    }
                })
                ->where(function($month_session){
                    if(Session::exists(['month','year']))
                    {
                        $month_session->where('project_type','like','%' . 'DONATЕ FOR MOST URGENT NEEDS'. '%')->where('status',true);
                    }
                })
                ->where(function($failed_session){
                    if(Session::exists(['failed','year']))
                    {
                        $failed_session->where('status',false);
                    }
                })
            ;
        }elseif (Session::get('month')) {
            $model = $this->model::with(['children', 'sponsor', 'fundraiser', 'gift'])->where('status',true)->where('project_type','like','%' . 'DONATЕ FOR MOST URGENT NEEDS'. '%');
        }elseif (Session::get('gift')) {
            $model = $this->model::with(['children', 'sponsor', 'fundraiser', 'gift'])->where('status',true)->whereNotNull('gift_id');
        }
        elseif (Session::get('fundraiser')) {
            $model = $this->model::with(['children', 'sponsor', 'fundraiser', 'gift'])->where('status',true)->whereNotNull('fundraiser_id');
        }
        elseif (Session::get('failed')) {
            $model = $this->model::with(['children', 'sponsor', 'fundraiser', 'gift'])->where('status',false);
        }
        elseif (Session::get('child')) {
            $model = $this->model::with(['children', 'sponsor', 'fundraiser', 'gift'])->where('status',true)->whereNotNull('children_id');
        }
        else {
            $model = $this->model::with(['children', 'sponsor', 'fundraiser', 'gift'])->where('status',true);
        }

        //Session::put('sort', $request->get('start') ?? 0);


        $search = $request->input('search');

        $result = DataTables::eloquent($model)
            ->order(function (Builder $query) use ($request) {

                    $query->orderBy('id', 'desc');

            })->filter(function (Builder $query) use ($search) {
                if (!empty($search['value'])) {
                    /*$query->whereHas('children', function ($subquery) use ($search) {
                        $subquery->whereRaw('json_unquote(json_extract(childrens.title, "$.'.$this->lang.'")) LIKE "%'.$search['value'].'%"');
                    });
                    $query->orWhereHas('sponsor', function ($subquery) use ($search) {
                        $subquery->orWhereRaw('name', 'LIKE', '%' . $search['value'] . '%');
                    });*/
                    // TODO search part not completed
                    if (Session::get('month')) {
                        $query->where('status',true)->where(function ($e) use ($search){
                            $e->where('email', 'LIKE', '%' . $search['value'] . '%');
                            $e->orWhere('email', 'LIKE', '%' . $search['value'] . '%')->orWhere('fullname', 'LIKE', '%' . $search['value'] . '%')
                                ->orWhereHas('sponsor.options', function (Builder $q) use ($search) {
                                    $q->where('sponsor_id', 'LIKE', '%' . $search['value'] . '%');
                                });
                        })->where('project_type','like','%' . 'DONATЕ FOR MOST URGENT NEEDS'. '%');
                    }elseif (Session::get('gift')) {
                        $query->where('status',true)->where(function ($e) use ($search){
                            $e->where('email', 'LIKE', '%' . $search['value'] . '%');
                            $e->orWhere('email', 'LIKE', '%' . $search['value'] . '%')->orWhere('fullname', 'LIKE', '%' . $search['value'] . '%')
                                ->orWhereHas('sponsor.options', function (Builder $q) use ($search) {
                                    $q->where('sponsor_id', 'LIKE', '%' . $search['value'] . '%');
                                });
                        })->whereNotNull('gift_id');
                    }
                    elseif (Session::get('fundraiser')) {
                        $query->where('status',true)->where(function ($e) use ($search){
                            $e->where('email', 'LIKE', '%' . $search['value'] . '%');
                            $e->orWhere('email', 'LIKE', '%' . $search['value'] . '%')->orWhere('fullname', 'LIKE', '%' . $search['value'] . '%')
                                ->orWhereHas('sponsor.options', function (Builder $q) use ($search) {
                                    $q->where('sponsor_id', 'LIKE', '%' . $search['value'] . '%');
                                });
                        })->whereNotNull('fundraiser_id');
                    }
                    elseif (Session::get('failed')) {
                        $query->where('status',false)->where(function ($e) use ($search){
                            $e->where('email', 'LIKE', '%' . $search['value'] . '%');
                            $e->orWhere('email', 'LIKE', '%' . $search['value'] . '%')->orWhere('fullname', 'LIKE', '%' . $search['value'] . '%')
                                ->orWhereHas('sponsor.options', function (Builder $q) use ($search) {
                                    $q->where('sponsor_id', 'LIKE', '%' . $search['value'] . '%');
                                });
                        });
                    }
                    elseif (Session::get('child')) {
                        $query->where('status',true)->where('email', 'LIKE', '%' . $search['value'] . '%')->orWhere('fullname', 'LIKE', '%' . $search['value'] . '%')->whereNotNull('children_id');
                    }
                    else {
                        $query->where('status',true)->where(function ($e) use ($search){
                            $e->where('email', 'LIKE', '%' . $search['value'] . '%');
                            $e->orWhere('email', 'LIKE', '%' . $search['value'] . '%')->orWhere('fullname', 'LIKE', '%' . $search['value'] . '%')
                                ->orWhereHas('sponsor.options', function (Builder $q) use ($search) {
                                    $q->where('sponsor_id', 'LIKE', '%' . $search['value'] . '%');
                                });
                        })
                        ;
                    }
//                    $query->where('order_id', 'LIKE', '%' . $search['value'] . '%');
//                    $query->orWhere('email', 'LIKE', '%' . $search['value'] . '%');
//                    $query->orWhere('created_at', 'LIKE', '%' . $search['value'] . '%');
//                    $query->orWhere('fullname', 'LIKE', '%' . $search['value'] . '%');
//                    $query->orwhereHas('fundraiser', function($q) use ($search){
//                        $q->where('title', 'LIKE', '%' . $search['value'] . '%');
//                    });
//                    $query->orwhereHas('gift', function($q) use ($search){
//                        $q->where('title', 'LIKE', '%' . $search['value'] . '%');
//                    });
//                    $query->orwhereHas('sponsor', function($q) use ($search){
//                        $q->where('name', 'LIKE', '%' . $search['value'] . '%');
//                    });
                }
            });

        $result->editColumn('status', function (Donation $item) {
            $checked = $item->status ? ' checked' : '';
            return '<label class="custom-toggle status-changer">
                    <input type="checkbox" value="'.$item->status.'" '.$checked.' disabled>
                    <span class="custom-toggle-slider rounded-circle"></span>
                </label>';
        });

//        $result->editColumn('is_binding', function (Donation $item) {
//            $checked = $item->is_binding ? ' checked' : '';
//            return '<label class="custom-toggle binding-changer">
//                    <input type="checkbox" value="'.$item->is_binding.'" '.$checked.' disabled>
//                    <span class="custom-toggle-slider rounded-circle"></span>
//                </label>';
//        });

        $result->editColumn('name', function (Donation $item) {
            return $item->name;
        });

        $result->editColumn('children_id', function (Donation $item) {
            $bind_child = Binding::where('bindingId',$item->bindingId)->first();
            $childs = [
                $item->children->title ?? null,
                $item->children->child_id ?? $bind_child->child->child_id ?? null,

            ];
            $childs = implode("<br>", $childs);

            return $childs;
        });

        $result->editColumn('card_type', function (Donation $item) {

            return $item->card_type;
        });

        $result->editColumn('sponsor_id', function (Donation $item) {
            $arrTest = [
                $item->sponsor->options->sponsor_id ?? null,
                $item->sponsor()->withTrashed()->name ?? null ? : $item->fullname ?? null,
                $item->sponsor()->withTrashed()->email ?? null ? : $item->email ?? null,

            ];

            $arrTest = implode("\n", $arrTest);

            return $arrTest;



        });
//
//        $result->editColumn('fundraiser_id', function (Donation $item) {
//            return $item->fundraiser->title ?? null;
//        });
//
//        $result->editColumn('gift_id', function (Donation $item) {
//            return $item->gift->title ?? null;
//        });
        $result->editColumn('project_type', function (Donation $item) {
            if ($item->project_type == null){
            $a = [
                $item->count !== 0 && $item->is_binding == 0 && $item->gift == null ? 'Child Sponsorship '. $item->count .' Month | Manual' : '' .
                Str::limit($item->fundraiser->title ?? null,20) .
                Str::limit($item->gift->title ?? null,20)
            ];
            }else{
                $a = [
                Str::limit($item->fundraiser->title ?? null,20) .
                Str::limit($item->gift->title ?? null,20)
                . $item->project_type ?? null
                ];

            }
            return str_replace(',',' ',$a);
            //return $item->fundraiser->title ?? null ? Str::limit($item->fundraiser->title ?? null,10,'...') : Str::limit($item->gift->title ?? null,10,'...');
        });
        $result->editColumn('created_at', function (Donation $item) {
            $date = [
                $item->created_at->format('d-m-Y '),
                $item->created_at->format('H:i:s')
            ];
            $date = implode('<br>',$date);
            return $date;//->calendar();
        });

        $result->editColumn('amount', function (Donation $item) {
            return number_format($item->amount) . ' AMD';
        });
        $result->editColumn('message', function (Donation $item) {
            return Str::limit($item->message ?? null,10,'...');
        });
        $result->editColumn('message_admin', function (Donation $item) {
            // return '<a href="" class="update" data-name="message_admin" data-type="text" data-pk='.$item->id.' data-title="Enter Name" style="color:#9DA5B7 !important">'. $item->message_admin .'</a>';
            return '
            <form action="'. route('admin.donations.updateAjax',['id'=>$item->id]).'" method="post" >
            <input type="hidden" name="_token" value="'. csrf_token() .'" />
            <textarea style="resize: none; width: 80px" type="text" class="form-control input-sm uif-hidden" name="message_admin" >'. $item->message_admin .'</textarea>
            <button type="submit" class="real-time-save" style="width: 80px">Save</button>
            </form>
            ';
        });


        return $result->rawColumns(['status', 'is_binding','message_admin','created_at','children_id'])->toArray();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $item = $this->model::with(['children', 'sponsor', 'fundraiser', 'gift'])->findOrFail($id);
        $backUrl = route('admin.donations.index');
        DB::table('donations')->where('id',$id)->update([ 'seen' => '1']);

        return response()
            ->view('admin.pages.donations.show', compact('backUrl', 'item'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $item = $this->model::with(['children', 'sponsor', 'fundraiser', 'gift'])->findOrFail($id);
        DB::table('donations')->where('id',$id)->update([ 'seen' => '1']);

        $backUrl = route('admin.donations.index');

        return response()
            ->view('admin.pages.donations.edit', compact('backUrl', 'item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateDonationRequest $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateDonationRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $item->update($request->except('_token', '_method'));
        return redirect()
            ->route('admin.donations.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DeleteDonationRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(DeleteDonationRequest $request, int $id)
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
     * @param StatusDonationRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function status(StatusDonationRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $result = ['success' => false];
        $item->status = $request->value;
        if ($item->save()) {
            $result['success'] = true;
        }

        return response()->json($result);
    }

    /**
     * Bind/Unbind the specified resource from storage
     *
     * @param BindingDonationRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function binding(BindingDonationRequest $request, int $id)
    {
        $item = $this->model::findOrFail($id);
        $result = ['success' => false];
        $item->is_binding = $request->value;
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
            ->view('admin.pages.donations.trash.index', compact('items'));
    }

    /**
     * Restores the specified resource from trash
     *
     * @param RestoreDonationRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function restore(RestoreDonationRequest $request, int $id)
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
     * @param ForceDestroyDonationRequest $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function forceDestroy(ForceDestroyDonationRequest $request, int $id)
    {
        $item = $this->model::withTrashed()->findOrFail($id);
        $result = ['success' => false];
        if ($item->forceDelete()) {
            $result['success'] = true;
        }

        return response()->json($result);
    }

    public function updateAjax(Request $request, int $id)
    {
        $request->validate([
            'message_admin' => 'nullable|string'
        ]);
        $this->model->where('id',$id)->update(['message_admin' => $request['message_admin']]);
        return redirect()->route('admin.donations.index');
    }
}
