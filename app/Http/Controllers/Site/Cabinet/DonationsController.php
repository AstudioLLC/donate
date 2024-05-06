<?php

namespace App\Http\Controllers\Site\Cabinet;

use App\Http\Controllers\Site\BaseController;
use App\Models\Donation;
use App\Models\User;

class DonationsController extends BaseController
{
    /**
     * View namespace for Cabinet
     * @var string
     */
    protected $viewsNamespace = 'site.pages.cabinet.';

    public function index()
    {
        $this->staticSEO(__('frontend.cabinet.My donations'));

        $breadcrumbs = [
            [
                'title' => __('frontend.cabinet.My donations'),
                'url' => ''
            ]
        ];

        $user = auth()->user();
        $sponsors = User::all();
        $bindings = Donation::where('is_binding',1)->whereNotNull('mdorder')->where('status', 1)->whereNotNull('amount')->where('email','maria@astudio.am')->get();
        $donations = Donation::where(['sponsor_id' => $user->id])->orderBy('created_at', 'desc')->get();
        // TODO add download receipt in view blade
        $active = 'donations';

        return response()
            ->view($this->viewsNamespace.'donations.index', compact('bindings','sponsors','user', 'breadcrumbs', 'active', 'donations'));
    }
}
