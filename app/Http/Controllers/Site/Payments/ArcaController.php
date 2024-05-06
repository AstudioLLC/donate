<?php

namespace App\Http\Controllers\Site\Payments;

use App\Http\Controllers\Site\BaseController;
use App\Mail\NewFailedPayment;
use App\Mail\NewGiftPayment;
use App\Models\Donation;
use App\Models\Fundraiser;
use App\Traits\Arca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use MailchimpMarketing\ApiClient;

class ArcaController extends BaseController
{
    use Arca;

    public function result(Request $request)
    {
        $user = Auth::user();
        $urls = session()->get('paymentUrls');
        if ($urls) {
            if (isset($urls['successUrl'])) {
                if ($this->resultArca($request)) {
                    if ($request->session()->get('gift')) {
                        $request->session()->forget('gift');
                        $request->session()->put('gift_payment', ['success' => 'success']);
                    } elseif ($request->session()->get('fundraiser')) {
                        $request->session()->forget('fundraiser');
                        $request->session()->put('fundraiser_payment', ['success' => 'success']);
                    } else {
                        //TODO forget session and redirect when sponsorship payment
                    }

                    return redirect()->to(url($urls['successUrl']));
                }
            }

            if (isset($urls['failUrl'])) {

                return redirect()->to(url($urls['failUrl']));
            }
        }

        return redirect()
            ->route('page', ['url' => $this->shared['homepage']->url]);
    }


}
