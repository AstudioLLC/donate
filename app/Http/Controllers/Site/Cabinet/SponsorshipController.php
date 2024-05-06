<?php

namespace App\Http\Controllers\Site\Cabinet;

use App\Http\Controllers\Site\BaseController;
use App\Http\Requests\Frontend\Sponsorship\PostCreateStep1Request;
use App\Http\Requests\Frontend\Sponsorship\PostCreateStep2Request;
use App\Http\Requests\Frontend\Sponsorship\PostCreateStep3Request;
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
use Illuminate\Support\Facades\Session;

class SponsorshipController extends BaseController
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




    public function index()
    {
        $this->staticSEO(__('frontend.cabinet.My Sponsorship'));

        $breadcrumbs = [
            [
                'title' => __('frontend.cabinet.My Sponsorship'),
                'url' => ''
            ]
        ];

        $user = auth()->user();
        $active = 'sponsorship';
        $childrens = Children::where(['sponsor_id' => auth()->user()->id, 'active'=> 1])
            ->with(['gallery', 'files', 'videos'])
            ->sort()
            ->get();

        $payment = false;
        if (\session()->get('sponsorship')) {
            \session()->forget('sponsorship_payment');
            $payment = true;
            session()->flush();
        }
        $gifts = Gift::where('active', 1)->orderBy('created_at','desc')->limit(4)->get();

        return response()
            ->view($this->viewsNamespace.'sponsorship.index', compact('user', 'breadcrumbs', 'active', 'childrens', 'gifts','payment'));
    }

    public function createStep1(Request $request)
    {
        $this->staticSEO(__('frontend.cabinet.My Sponsorship'));

        $breadcrumbs = [
            [
                'title' => __('frontend.cabinet.My Sponsorship'),
                'url' => ''
            ]
        ];
        $user = auth()->user();
        $regions = Region::where('active', 1)->sort()->get();
        $monthlyDonationAmount = $this->monthlyDonationAmount;
        $active = 'sponsorship';
        //$sponsorship = $request->session()->get('sponsorship');

        return response()
            ->view($this->viewsNamespace.'sponsorship.steps.step1', compact('user', 'breadcrumbs', 'active', 'regions', 'monthlyDonationAmount'));
    }

    public function postCreateStep1(PostCreateStep1Request $request)
    {
        $request->session()->put('sponsorship', $request->validated());
        //ddd($request);
        return redirect()
            ->route('cabinet.sponsorship.create.step2');
    }

    public function createStep2(Request $request)
    {
        if (empty($request->session()->get('sponsorship'))) {
            return redirect()->route('cabinet.sponsorship.create.step1');
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
            ->view($this->viewsNamespace.'sponsorship.steps.step2', compact('user', 'breadcrumbs', 'active', 'terms'));
    }

    public function postCreateStep2(PostCreateStep2Request $request)
    {
        $request->session()->put('sponsorship', $request->validated());

        return redirect()
            ->route('cabinet.sponsorship.create.step3');
    }

    public function createStep3(Request $request)
    {
        if (empty($request->session()->get('sponsorship'))) {
            return redirect()->route('cabinet.sponsorship.create.step1');
        }

        if (!isset($request->session()->get('sponsorship')['checkbox'])) {
            return redirect()->route('cabinet.sponsorship.create.step1');
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
            ->view($this->viewsNamespace.'sponsorship.steps.step3', compact('user', 'breadcrumbs', 'active', 'countries'));
    }

    public function postCreateStep3(PostCreateStep3Request $request)
    {
        $request->session()->put('sponsorship', $request->validated());
        $orderId = time();

        if ($request->get('want_recive_letters') && auth()->check()) {
            UserOptions::where('user_id',\auth()->id())->update(['want_recive_letters' => true]);
            $subscriber = Subscriber::firstOrCreate([
                'email' => $request->get('email')
            ], [
                'email' => $request->get('email'),
                'active' => 1
            ]);
        }

        /*Database::create([
            'order_id' => $orderId,
            'mdorder' => null,
            'status' => 0,
            'fundraiser_id' => null,
            'gift_id' => null,
            'is_binding' => $request->get('recurring_payment'),
            'bindingId' => null,
            'sponsor_id' => auth()->user() ? auth()->user()->getAuthIdentifier() : null,
            'children_id' => null,
            'amount' => $this->monthlyDonationAmount,
            'email' => $request->get('email'),
            'fullname' => $request->get('name'),
            'count' => $request->get('frequency'),

            'country_id' => (int)$request->get('country_id'),
            'city' => $request->get('city'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'card_type' => $request->get('payment_type') == 'idram' ? 'idram' : 'arca',
            'message' => $request->get('message'),
            'message_admin' => null,
        ]);*/

        if (session('sponsorship')['recurring_payment'] == 1 )
        {
            $pr_type = 'New Sponsorship | Automatic';
        }else{
            $pr_type = 'New Sponsorship |' . $request->get('frequency') . ' month ' .  'Manually';
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
            'children_id' => null,
            'anonymous' => $request->get('anonymous') ?? null,
            'amount' => $this->monthlyDonationAmount * (int)$request->get('frequency'),
            'email' => $request->get('email'),
            'fullname' => $request->get('name'),
            'whom_sp' => $request->get('whom_sp'),
            'count' => $request->get('frequency'),
            'area' => $request->get('children_region'),
            'country_id' => (int)$request->get('country_id'),
            'city' => $request->get('city'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'card_type' => $request->get('payment_type') == 'idram' ? 'idram' : 'arca',
            'message' => $request->get('message'),
            'message_admin' => null,
        ]);

        $failUrl = route('cabinet.sponsorship.create.step3');
        $successUrl = route('cabinet.sponsorship.index');
        $request->session()->put('paymentUrls', ['failUrl' => $failUrl, 'successUrl' => $successUrl]);

        if ($request->get('payment_type') == 'idram') {
            $this->createIdram($orderId);
        } else {
            $this->createArca($orderId);
        }

        return redirect()
            ->route('cabinet.sponsorship.create.step3')
            ->withInput($request->validated());
    }
}
