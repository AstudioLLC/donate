<?php

namespace App\Http\Controllers\Site\Cabinet;

use App\Http\Controllers\Site\BaseController;
use App\Models\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotificationController extends BaseController
{
    /**
     * View namespace for Cabinet
     * @var string
     */
    protected $viewsNamespace = 'site.pages.cabinet.';

    public function index()
    {
        $user = auth()->user();

        $sp_donations = Donation::where('sponsor_id', $user->id)->orderBy('created_at','desc')->get();
        $this->staticSEO(__('frontend.cabinet.Notification'));

        $breadcrumbs = [
            [
                'title' => __('frontend.cabinet.Notification'),
                'url' => ''
            ]
        ];

        $active = 'notification';

        return response()
            ->view($this->viewsNamespace.'notification.index', compact('user', 'breadcrumbs', 'active','sp_donations'));
    }

    public function donationallseen(Request $request)
    {
        //$user = Auth::user();
        //Mail::to($user->email)->send(new newVideo($user));

        DB::table('donations')->where('sponsor_id',auth()->user()->id)->update([ 'user_seen' => '1']);

        return redirect()->back();
    }
}
