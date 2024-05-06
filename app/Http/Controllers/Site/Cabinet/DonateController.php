<?php

namespace App\Http\Controllers\Site\Cabinet;

use App\Http\Controllers\Site\BaseController;
use App\Http\Requests\Frontend\Donate\PostCreateStep1Request;
use App\Http\Requests\Frontend\Donate\PostCreateStep2Request;
use App\Http\Requests\Frontend\Donate\PostCreateStep3Request;
use App\Models\Children;
use App\Models\Country;
use App\Models\Database;
use App\Models\Donation;
use App\Models\Gift;
use App\Models\Page;
use App\Models\Region;
use App\Models\Subscriber;
use App\Models\UserOptions;
use App\Traits\Arca;
use App\Traits\Idram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DonateController extends BaseController
{
    use Idram, Arca;

    /**
     * View namespace for Cabinet
     * @var string
     */
    protected $viewsNamespace = 'site.pages.cabinet.';

    /**
     * @var int
     */
    protected $monthlyDonationAmount = 8000;


    public function createStep1(Request $request)
    {
        $this->staticSEO(__('frontend.cabinet.My Sponsorship'));

        $breadcrumbs = [
            [
                'title' => __('frontend.cabinet.My Sponsorship'),
                'url' => ''
            ]
        ];
        $childrens = Children::where(['sponsor_id' => auth()->user()->id, 'active'=> 1])
            ->with(['gallery', 'files', 'videos'])
            ->sort()
            ->get();
        $user = auth()->user();
        $regions = Region::where('active', 1)->sort()->get();
        $monthlyDonationAmount = $this->monthlyDonationAmount;
        $active = 'sponsorship';
        $prices  =  [
            1 => '8000',
        ];
        //$sponsorship = $request->session()->get('sponsorship');

        return response()
            ->view($this->viewsNamespace.'donate.steps.step1', compact('user', 'prices','childrens','breadcrumbs', 'active', 'regions', 'monthlyDonationAmount'));
    }

    public function postCreateStep1(PostCreateStep1Request $request)
    {
        $request->session()->put('sponsorship', $request->validated());
        return redirect()
            ->route('cabinet.donate.create.step2');
    }

    public function createStep2(Request $request)
    {
        if (empty($request->session()->get('sponsorship'))) {
            return redirect()->route('cabinet.donate.create.step1');
        }

        $this->staticSEO(__('frontend.cabinet.My Sponsorship'));

        $breadcrumbs = [
            [
                'title' => __('frontend.cabinet.My Sponsorship'),
                'url' => ''
            ]
        ];

        $user = auth()->user();
        $terms = Page::where(['static' => 'terms_and_contidions'])->select('title', 'content')->firstOrFail();
        $active = 'sponsorship';
        //$sponsorship = $request->session()->get('sponsorship');

        return response()
            ->view($this->viewsNamespace.'donate.steps.step2', compact('user', 'breadcrumbs', 'active', 'terms'));
    }

    public function postCreateStep2(PostCreateStep2Request $request)
    {
        $request->session()->put('sponsorship', $request->validated());

        return redirect()
            ->route('cabinet.donate.create.step3');
    }

    public function createStep3(Request $request)
    {
        if (empty($request->session()->get('sponsorship'))) {
            return redirect()->route('cabinet.donate.create.step1');
        }

        if (!isset($request->session()->get('sponsorship')['checkbox'])) {
            return redirect()->route('cabinet.donate.create.step1');
        }

        $this->staticSEO(__('frontend.cabinet.My Sponsorship'));

        $breadcrumbs = [
            [
                'title' => __('frontend.cabinet.My Sponsorship'),
                'url' => ''
            ]
        ];

        $user = auth()->user();
        $countries = Country::sort()->get();
        $active = 'sponsorship';
        //$sponsorship = $request->session()->get('sponsorship');

        return response()
            ->view($this->viewsNamespace.'donate.steps.step3', compact('user', 'breadcrumbs', 'active', 'countries'));
    }

    public function postCreateStep3(PostCreateStep3Request $request)
    {
        $request->session()->put('sponsorship', $request->validated());
        //ddd($request);
        $orderId = time();

//        if ($request->get('subscriber_checkbox') && auth()->check()) {
//            UserOptions::where('user_id',\auth()->id())->update(['want_recive_letters' => true]);
//            $subscriber = Subscriber::firstOrCreate([
//                'email' => $request->get('email')
//            ], [
//                'email' => $request->get('email'),
//                'active' => 1
//            ]);
//        }

        /*Database::create([
            'order_id' => $orderId,
            'mdorder' => null,
            'status' => 0,
            'fundraiser_id' => null,
            'gift_id' => null,
            'is_binding' => 0,
            'bindingId' => null,
            'sponsor_id' => auth()->user() ? auth()->user()->getAuthIdentifier() : null,
            'children_id' => $request->get('children_id'),
            'amount' => (int)$request->get('amount'),
            'email' => $request->get('email'),
            'fullname' => $request->get('name'),
            'country_id' => (int)$request->get('country_id'),
            'city' => $request->get('city'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'card_type' => $request->get('payment_type') == 'idram' ? 'idram' : 'arca',
            'message' => $request->get('message'),
            'message_admin' => null,
        ]); */
        $child = Children::where('id',$request->get('children_id'))->first();
        if (session('sponsorship')['recurring_payment'] == 1 )
        {
            $pr_type = 'New Sponsorship | Automatic | Child ID - ' . $child->child_id ?? '';
        }else{
            $pr_type = 'New Sponsorship | Manually | Child ID - ' . $child->child_id ?? '';
        }
        Donation::create([
            'order_id' => $orderId,
            'mdorder' => null,
            'status' => 0,
            'project_type' => $pr_type,
            'fundraiser_id' => null,
            'gift_id' => null,
            'is_binding' => $request->get('recurring_payment'),
            'bindingId' => null,
            'sponsor_id' => auth()->user() ? auth()->user()->getAuthIdentifier() : null,
            'children_id' => $request->get('children_id'),
            'amount' => (int)$request->get('amount'),
            'email' => $request->get('email'),
            'fullname' => $request->get('name'),
            'anonymous' => $request->get('anonymous') ?? null,
            'country_id' => (int)$request->get('country_id'),
            'city' => $request->get('city'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'card_type' => $request->get('payment_type') == 'idram' ? 'idram' : 'arca',
            'message' => $request->get('message'),
            'message_admin' => null,
        ]);

        $failUrl = route('cabinet.donate.create.step3');
        $successUrl = route('cabinet.sponsorship.index');
        $request->session()->put('paymentUrls', ['failUrl' => $failUrl, 'successUrl' => $successUrl]);

        if ($request->get('payment_type') == 'idram') {
            $this->createIdram($orderId);
        } else {
            $this->createArca($orderId);
        }

        return redirect()
            ->route('cabinet.donate.create.step3')
            ->withInput($request->validated());
    }
}
