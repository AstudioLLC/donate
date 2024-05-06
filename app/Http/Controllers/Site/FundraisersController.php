<?php

namespace App\Http\Controllers\Site;

use App\Constants\UserRole;
use App\Http\Requests\Frontend\Fundraisers\PostCreateStep1Request;
use App\Http\Requests\Frontend\Fundraisers\PostCreateStep2Request;
use App\Http\Requests\Frontend\Fundraisers\PostCreateStep3Request;
use App\Models\Country;
use App\Models\Database;
use App\Models\Donation;
use App\Models\Fundraiser;
use App\Models\Page;
use App\Models\Subscriber;
use App\Models\UserOptions;
use App\Traits\Arca;
use App\Traits\Idram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FundraisersController extends BaseController
{
    use Idram, Arca;

    protected function detail($url)
    {
        $page = Page::where(['static' => 'day_care', 'active' => 1])->first();
        $item = Fundraiser::where(['url' => $url, 'active' => 1])->firstOrFail();

        $becomeSponsor = Page::where(['static' => 'become_a_sponsor', 'active' => 1])->select('title', 'icon')->first();
        $donate = Page::where(['static' => 'donate', 'active' => 1])->select('title', 'icon')->first();

        $this->renderSEO($item);
        $breadcrumbs = $this->renderBreadcrumbs($page, $item);

        return response()
            ->view('site.pages.fundraisers.detail', compact('page', 'item', 'breadcrumbs', 'becomeSponsor', 'donate'));
    }

    public function create($url)
    {
        $page = Page::where(['static' => 'give_a_gift', 'active' => 1])->firstOrFail();
        $item = Fundraiser::where(['url' => $url, 'active' => 1])->firstOrFail();
        $createUrl = route('fundraisers.create.step1', ['url' => $item->url ?? null]);

        if (auth()->user() && auth()->user()->role >= UserRole::SPONSOR) {
            return redirect()->route('fundraisers.create.step1', ['url' => $item->url ?? null]);
        }

        $this->renderSEO($item);
        $breadcrumbs = $this->renderBreadcrumbs($page, $item);

        return response()
            ->view('site.pages.fundraisers.create', compact('page', 'item', 'breadcrumbs', 'createUrl'));
    }

    public function createStep1(Request $request, $url)
    {
        $page = Page::where(['static' => 'day_care', 'active' => 1])->first();
        $item = Fundraiser::where(['url' => $url, 'active' => 1])->firstOrFail();
        //$fundraiser = $request->session()->get('fundraiser');

        $this->renderSEO($item);
        $breadcrumbs = $this->renderBreadcrumbs($page, $item);
        $prices  =  [
            1 => '3000',
            2 => '5000',
            3=> '10000',
            4 => '20000'
        ];
        return response()
            ->view('site.pages.fundraisers.steps.step1', compact('page', 'item', 'breadcrumbs','prices'));
    }

    public function postCreateStep1(PostCreateStep1Request $request, $url)
    {
//        ddd($request);
        $item = Fundraiser::where(['url' => $url, 'active' => 1])->firstOrFail();
        $request->session()->put('fundraiser', $request->validated());

        return redirect()->route('fundraisers.create.step2', ['url' => $item->url ?? null]);
    }

    public function createStep2(Request $request, $url)
    {
        if (empty($request->session()->get('fundraiser'))) {
            return redirect()->route('fundraisers.create.step1', ['url' => $url ?? null]);
        }
        $page = Page::where(['static' => 'day_care', 'active' => 1])->first();
        $item = Fundraiser::where(['url' => $url, 'active' => 1])->firstOrFail();
        $terms = Page::where(['static' => 'terms_and_contidions'])->select('title', 'content')->firstOrFail();
        $fundraiser = $request->session()->get('fundraiser');

        $this->renderSEO($item);
        $breadcrumbs = $this->renderBreadcrumbs($page, $item);

        return response()
            ->view('site.pages.fundraisers.steps.step2', compact('page', 'item', 'terms', 'breadcrumbs'));
    }

    public function postCreateStep2(PostCreateStep2Request $request, $url)
    {
        $item = Fundraiser::where(['url' => $url, 'active' => 1])->firstOrFail();
        $request->session()->put('fundraiser', $request->validated());

        return redirect()->route('fundraisers.create.step3', ['url' => $item->url ?? null]);
    }

    public function createStep3(Request $request, $url)
    {
        if (empty($request->session()->get('fundraiser'))) {
            return redirect()->route('fundraisers.create.step1', ['url' => $url ?? null]);
        }

        if (!isset($request->session()->get('fundraiser')['checkbox'])) {
            return redirect()->route('fundraisers.create.step1', ['url' => $url ?? null]);
        }

        $page = Page::where(['static' => 'day_care', 'active' => 1])->first();
        $item = Fundraiser::where(['url' => $url, 'active' => 1])->firstOrFail();
        $user = auth()->user();
        $countries = Country::sort()->get();
        $fundraiser = $request->session()->get('fundraiser');

        $this->renderSEO($item);
        $breadcrumbs = $this->renderBreadcrumbs($page, $item);

        return response()
            ->view('site.pages.fundraisers.steps.step3', compact('page', 'item', 'countries', 'breadcrumbs', 'user'));
    }

    public function postCreateStep3(PostCreateStep3Request $request, $url)
    {
        $item = Fundraiser::where(['url' => $url, 'active' => 1])->firstOrFail();
        $request->session()->put('fundraiser', $request->validated());
        $page = Page::where(['static' => 'day_care', 'active' => 1])->first();
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

       /* Database::create([
            'order_id' => $orderId,
            'mdorder' => null,
            'status' => 0,
            'fundraiser_id' => $item->id,
            'gift_id' => null,
            'is_binding' => 0,
            'bindingId' => null,
            'sponsor_id' => auth()->user() ? auth()->user()->getAuthIdentifier() : null,
            'children_id' => null,
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
        Donation::create([
            'order_id' => $orderId,
            'mdorder' => null,
            'status' => 0,
            'project_type' => 'Fundraiser - ',
            'fundraiser_id' => $item->id,
            'gift_id' => null,
            'is_binding' => 0,
            'bindingId' => null,
            'sponsor_id' => auth()->user() ? auth()->user()->getAuthIdentifier() : null,
            'children_id' => null,
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

        $failUrl = route('fundraisers.create.step3', ['url' => $item->url ?? null]);
        $successUrl = route('page', ['url' => $page->url ?? null]);
        //$successUrl = route('success.fundraiser.payment',compact('fundraiser'));
        $request->session()->put('paymentUrls', ['failUrl' => $failUrl, 'successUrl' => $successUrl]);

        if ($request->get('payment_type') == 'idram') {
            $this->createIdram($orderId);
        } else {
            $this->createArca($orderId);
        }

        /*$payment = true;
        if ($payment) {
            $page = Page::where(['static' => 'day_care', 'active' => 1])->firstOrFail();
            $request->session()->forget('fundraiser');
            $request->session()->put('fundraiser_payment', ['success' => 'success']);

            return redirect()
                ->route('page', ['url' => $page->url ?? null]);
        }*/

        return redirect()
            ->route('fundraisers.create.step3', ['url' => $item->url ?? null])
            ->withInput($request->validated());
    }

}
