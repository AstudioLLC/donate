<?php

namespace App\Http\Controllers\Site;

use App\Constants\UserRole;
use App\Http\Requests\Frontend\Gifts\postCreateStep1Request;
use App\Http\Requests\Frontend\Gifts\PostCreateStep2Request;
use App\Http\Requests\Frontend\Gifts\PostCreateStep3Request;
use App\Models\Country;
use App\Models\Database;
use App\Models\Donation;
use App\Models\Gift;
use App\Models\Page;
use App\Models\Subscriber;
use App\Models\User;
use App\Models\UserOptions;
use Illuminate\Http\Request;
use App\Traits\Arca;
use App\Traits\Idram;
use Illuminate\Support\Facades\Auth;

class GiftsController extends BaseController
{
    use Idram, Arca;

    protected function detail($url, Request $request)
    {
        $page = Page::where(['static' => 'give_a_gift', 'active' => 1])->firstOrFail();
        $item = Gift::where(['url' => $url, 'active' => 1])->firstOrFail();
        $items = Gift::where(['active' => 1])->where('url', '!=', $url)->inRandomOrder()->limit(10)->get();
        $faq = Page::where(['active' => 1, 'static' => 'faq'])->first();

        $this->renderSEO($item);
        $breadcrumbs = $this->renderBreadcrumbs($page, $item);
        session()->put(['giftChildren' => request()->id ?? '']);
        return response()
            ->view('site.pages.gifts.detail', compact('page', 'item', 'items', 'breadcrumbs', 'faq'));
    }

    public function create($url)
    {
        $page = Page::where(['static' => 'give_a_gift', 'active' => 1])->firstOrFail();
        $item = Gift::where(['url' => $url, 'active' => 1])->firstOrFail();
        $createUrl = route('gifts.create.step1', ['url' => $item->url ?? null]);

        if (auth()->user() && auth()->user()->role >= UserRole::SPONSOR) {
            return redirect()->route('gifts.create.step1', ['url' => $item->url ?? null]);
        }

        $this->renderSEO($item);
        $breadcrumbs = $this->renderBreadcrumbs($page, $item);

        return response()
            ->view('site.pages.gifts.create', compact('page', 'item', 'breadcrumbs', 'createUrl'));
    }

    public function createStep1(Request $request, $url)
    {
        $page = Page::where(['static' => 'give_a_gift', 'active' => 1])->firstOrFail();
        $item = Gift::where(['url' => $url, 'active' => 1])->firstOrFail();
        //$gift = $request->session()->get('gift');

        $this->renderSEO($item);
        $breadcrumbs = $this->renderBreadcrumbs($page, $item);

        return response()
            ->view('site.pages.gifts.steps.step1', compact('page', 'item', 'breadcrumbs'));
    }

    public function postCreateStep1(PostCreateStep1Request $request, $url)
    {
        $item = Gift::where(['url' => $url, 'active' => 1])->firstOrFail();
        $request->session()->put('gift', $request->validated());

        return redirect()->route('gifts.create.step2', ['url' => $item->url ?? null]);
    }

    public function createStep2(Request $request, $url)
    {
        if (empty($request->session()->get('gift'))) {
            return redirect()->route('gifts.create.step1', ['url' => $url ?? null]);
        }
        $page = Page::where(['static' => 'give_a_gift', 'active' => 1])->firstOrFail();
        $item = Gift::where(['url' => $url, 'active' => 1])->firstOrFail();
        $terms = Page::where(['static' => 'terms_and_contidions'])->select('title', 'content')->firstOrFail();
        $gift = $request->session()->get('gift');

        $this->renderSEO($item);
        $breadcrumbs = $this->renderBreadcrumbs($page, $item);

        return response()
            ->view('site.pages.gifts.steps.step2', compact('page', 'item', 'terms', 'breadcrumbs'));
    }

    public function postCreateStep2(PostCreateStep2Request $request, $url)
    {
        $item = Gift::where(['url' => $url, 'active' => 1])->firstOrFail();
        $request->session()->put('gift', $request->validated());

        return redirect()->route('gifts.create.step3', ['url' => $item->url ?? null]);
    }

    public function createStep3(Request $request, $url)
    {
        if (empty($request->session()->get('gift'))) {
            return redirect()->route('gifts.create.step1', ['url' => $url ?? null]);
        }

        if (!isset($request->session()->get('gift')['checkbox'])) {
            return redirect()->route('gifts.create.step1', ['url' => $url ?? null]);
        }

        $page = Page::where(['static' => 'give_a_gift', 'active' => 1])->firstOrFail();
        $item = Gift::where(['url' => $url, 'active' => 1])->firstOrFail();
        $user = auth()->user();
        $countries = Country::sort()->get();
        $gift = $request->session()->get('gift');

        $this->renderSEO($item);
        $breadcrumbs = $this->renderBreadcrumbs($page, $item);

        return response()
            ->view('site.pages.gifts.steps.step3', compact('page', 'item', 'countries', 'breadcrumbs', 'user'));
    }

    public function postCreateStep3(PostCreateStep3Request $request, $url)
    {

        $item = Gift::where(['url' => $url, 'active' => 1])->firstOrFail();
        $request->session()->put('gift', $request->validated());
        $page = Page::where(['static' => 'give_a_gift', 'active' => 1])->firstOrFail();
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
            'gift_id' => $item->id,
            'is_binding' => 0,
            'bindingId' => null,
            'sponsor_id' => auth()->user() ? auth()->user()->getAuthIdentifier() : null,
            'children_id' => null,
            'amount' => $request->get('cost') * $request->get('count'),
            'cost' => (int)$request->get('cost'),
            'count' => (int)$request->get('count'),
            'email' => $request->get('email'),
            'fullname' => $request->get('name'),
            'country_id' => (int)$request->get('country_id'),
            'city' => $request->get('city'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'card_type' => $request->get('payment_type') == 'idram' ? 'idram' : 'arca',
            'message' => null,
            'message_admin' => null,
        ]); */
        Donation::create([
            'order_id' => $orderId,
            'mdorder' => null,
            'status' => 0,
            'fundraiser_id' => null,
            'project_type' => 'Gift - ',
            'gift_id' => $item->id,
            'is_binding' => 0,
            'bindingId' => null,
            'sponsor_id' => auth()->user() ? auth()->user()->getAuthIdentifier() : null,
            'children_id' => session()->get('giftChildren') ?? null,
            'amount' => $request->get('cost') * $request->get('count'),
            'cost' => (int)$request->get('cost'),
            'count' => (int)$request->get('count'),
            'anonymous' => $request->get('anonymous') ?? null,
            'email' => $request->get('email'),
            'fullname' => $request->get('name'),
            'country_id' => (int)$request->get('country_id'),
            'city' => $request->get('city'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
            'card_type' => $request->get('payment_type') == 'idram' ? 'idram' : 'arca',
            'message' => null,
            'message_admin' => null,
        ]);

        $failUrl = route('gifts.create.step3', ['url' => $item->url ?? null]);
        $successUrl = route('page', ['url' => $page->url ?? null]);
        $request->session()->put('paymentUrls', ['failUrl' => $failUrl, 'successUrl' => $successUrl]);

        if ($request->get('payment_type') == 'idram') {
            $this->createIdram($orderId);
        } else {
            $this->createArca($orderId);
		}
		/*$payment = true;
        if ($payment) {
            $request->session()->forget('gift');
            $request->session()->put('gift_payment', ['success' => 'success']);

            return redirect()
                ->route('page', ['url' => $page->url ?? null]);
        }*/

        return redirect()
            ->route('gifts.create.step3', ['url' => $item->url ?? null])
            ->withInput($request->validated());
    }
}
