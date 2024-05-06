<?php

namespace App\Http\Controllers\Admin;

use App\Constants\UserRole;
use App\Http\Controllers\Controller;
use App\Models\Children;
use App\Models\Fundraiser;
use App\Models\Gift;
use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends AdminBaseController
{
    public function index()
    {
        /* For subscribers */
        $subscribers = Subscriber::where('active',true)->get();
        $last_month_subscribers = Subscriber::where('active',true)->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->get();

        /* For Fundraisers */
        $fundraisers = Fundraiser::where('active',true)->get();
        $last_month_fundraisers = Fundraiser::where('active',true)->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->get();

        /* For Gifts */
        $gifts = Gift::where('active',true)->get();
        $last_month_gifts = Gift::where('active',true)->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->get();

        /* For Childrens */
        $childrens = Children::where('active',true)->get();
        $last_month_childrens = Children::where('active',true)->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->get();

        /* For Sponsors */
        $sponsors = User::where('active',true)->where('role', UserRole::SPONSOR)->get();
        $last_month_sponsors = User::where('active',true)->whereMonth('created_at', '=', Carbon::now()->subMonth()->month)->get();
        $userData = User::select(DB::raw("COUNT(*) as count"))
            ->whereYear('created_at', date('Y'))
                ->where('role', UserRole::SPONSOR)
                    ->groupBy(DB::raw("Month(created_at)"))
                        ->pluck('count');

        return view('admin.pages.dashboard.index',
            compact('subscribers','last_month_subscribers',
                              'fundraisers','last_month_fundraisers',
                              'gifts','last_month_gifts',
                              'childrens','last_month_childrens',
                              'sponsors','last_month_sponsors','userData'
            ));
    }
}
