<?php

namespace App\Http\Controllers\Site\Cabinet;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Site\BaseController;
use App\Models\Donation;
use App\Models\Fundraiser;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FundraisersController extends BaseController
{
    /**
     * View namespace for Cabinet
     * @var string
     */
    protected $viewsNamespace = 'site.pages.cabinet.';

    public function index()
    {
        $this->staticSEO(__('frontend.cabinet.Fundraisers') . ' - ' . __('frontend.cabinet.My fundraisings'));

        $breadcrumbs = [
            [
                'title' => __('frontend.cabinet.Fundraisers'),
                'url' => ''
            ],
            [
                'title' => __('frontend.cabinet.My fundraisings'),
                'url' => ''
            ]
        ];

        $user = auth()->user();
        $active = 'fundraisers';
        $fundraisers = Fundraiser::whereIn('id',
            Donation::where(['sponsor_id' => $user->id, 'status' => 1])
                ->whereHas('fundraiser')
                ->select([
                    DB::raw('fundraiser_id as id')
                ])
                ->groupBy('fundraiser_id')
                ->get()
                ->toArray())
            ->where(['active' => 1])
            ->sort()
            ->get();

        return response()
            ->view($this->viewsNamespace.'fundraisers.index', compact('user', 'breadcrumbs', 'active', 'fundraisers'));
    }

    public function create()
    {
        $this->staticSEO(__('frontend.cabinet.Fundraisers') . ' - ' . __('frontend.cabinet.Create fundraiser'));

        $breadcrumbs = [
            [
                'title' => __('frontend.cabinet.Fundraisers'),
                'url' => ''
            ],
            [
                'title' => __('frontend.cabinet.Create fundraiser'),
                'url' => ''
            ]
        ];

        $user = auth()->user();
        $active = 'create';
        //$fundraisers = Fundraiser::where(['active' => 1, 'private' => 1, 'campaign' => 0])->whereHas('donations')->sort()->get();
        $fundraisers = Fundraiser::where(['active' => 1, 'private' => 1, 'campaign' => 0])->doesntHave('donations')->sort()->get();

        return response()
            ->view($this->viewsNamespace.'fundraisers.create', compact('user', 'breadcrumbs', 'active', 'fundraisers'));
    }
}
