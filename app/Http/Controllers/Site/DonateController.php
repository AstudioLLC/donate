<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\Donate\PostCreateStep1Request;
use App\Http\Requests\Donate\PostCreateStep2Request;
use App\Http\Requests\Donate\PostCreateStep3Request;
use App\Models\Country;
use App\Models\Database;
use App\Models\Donation;
use App\Models\Subscriber;
use App\Models\UserOptions;
use App\Rules\Recaptcha;
use App\Traits\Arca;
use App\Traits\Idram;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Facades\Auth;

class DonateController extends BaseController
{
    use Idram, Arca;

    public function postCreateStep1(PostCreateStep1Request $request)
    {
        $request->session()->put('donate', $request->validated());
        return redirect()
            ->route('donate.create.step2');
    }

    public function createStep2(Request $request)
    {

        if (empty($request->session()->get('donate'))) {
            return redirect()->route('donate.create.step2');
        }

        $this->staticSEO(__('frontend.Donate'));

        $breadcrumbs = [
            [
                'title' => __('frontend.Donate'),
                'url' => ''
            ]
        ];

        $user = auth()->user();
        $terms = Page::where(['static' => 'terms_and_contidions'])->select('title', 'content')->firstOrFail();
        //$sponsorship = $request->session()->get('sponsorship');
        return response()
            ->view('site.pages.donate.steps.step2', compact('user', 'breadcrumbs', 'terms'));
    }

    public function postCreateStep2(PostCreateStep2Request $request)
    {
        $request->session()->put('donate', $request->validated());

        return redirect()
            ->route('donate.create.step3');
    }


    public function createStep3(Request $request)
    {
        if (empty($request->session()->get('donate'))) {
            return redirect()->route('donate.create.step1');
        }

        if (!isset($request->session()->get('donate')['checkbox'])) {
            return redirect()->route('donate.create.step1');
        }

        $this->staticSEO(__('frontend.Donate'));

        $breadcrumbs = [
            [
                'title' => __('frontend.Donate'),
                'url' => ''
            ]
        ];

        $user = auth()->user();
        $countries = Country::sort()->get();
        //$sponsorship = $request->session()->get('sponsorship');
        return response()
            ->view('site.pages.donate.steps.step3', compact('user', 'breadcrumbs',  'countries'));
    }

    public function postCreateStep3(PostCreateStep3Request $request)
    {
        $request->session()->put('donate', $request->validated());
//        $this -> validate($request, [
//            'g-recaptcha-response' =>
//                ['required', new Recaptcha()]]);
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
            'fundraiser_id' => null,
            'gift_id' => null,
            'is_binding' => $request->get('is_binding'),
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
        ]);*/
        Donation::create([
            'order_id' => $orderId,
            'mdorder' => null,
            'status' => 0,
            'project_type' => $request->get('is_binding') == 1 ? 'DONATЕ FOR MOST URGENT NEEDS  ' . '| Monthly' : 'DONATЕ FOR MOST URGENT NEEDS  '  . '|  One time'  ,
            'fundraiser_id' => null,
            'gift_id' => null,
            'is_binding' => $request->get('is_binding'),
            'bindingId' => null,
            'sponsor_id' => auth()->user() ? auth()->user()->getAuthIdentifier() : null,
            'children_id' => null,
            'anonymous' => $request->get('anonymous') ?? null,
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
        ]);

        $failUrl = route('donate.create.step3');
        //$successUrl = route('page', ['url' => $page->url ?? null]);
        $successUrl = url('/');

        $request->session()->put('paymentUrls', ['failUrl' => $failUrl, 'successUrl' => $successUrl]);

        if ($request->get('payment_type') == 'idram') {
            $this->createIdram($orderId);
        } else {
            $this->createArca($orderId);
        }

        return redirect()
            ->route('donate.create.step3')
            ->withInput($request->validated());
    }


}
