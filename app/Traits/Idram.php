<?php

namespace App\Traits;

use App\Mail\NewFailedPayment;
use App\Mail\NewGiftPayment;
use App\Mail\newUnregisteredDonation;
use App\Models\Donation;
use App\Models\Fundraiser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Omnipay\Omnipay;
use App\Constants\Idram as IdramConstants;

trait Idram
{
    public static function createIdram(int $orderId)
    {
        $donation = DB::table('donations')->where('order_id', $orderId)->first();
        //$donation = Donation::where('order_id', $orderId)->first();
        abort_if(!$donation, 404);

        $gateway = Omnipay::create('Idram');
        $gateway->setAccountId(IdramConstants::EDP_REC_ACCOUNT);
        $gateway->setSecretKey(IdramConstants::SECRET_KEY);
        $purchaseData = $gateway->purchase();
        $purchaseData->setLanguage(app()->getLocale());
        $purchaseData->setAmount($donation->amount);
        $purchaseData->setTransactionId($orderId);
        //$purchaseData->setCustomData(array('EDP_FAIL_URL' => 'fail url', 'EDP_RESULT_URL' => 'result url', 'EDP_SUCCESS_URL' => 'success_url')); // Transaction ID from your system
        $purchaseData->setEmail('gor_harutyunyan_89@mail.ru');
        $purchase = $purchaseData->send();
        $purchase->redirect();
    }

    public function resultIdram(Request $request)
    {
        $gateway = Omnipay::create('Idram');
        $gateway->setAccountId(IdramConstants::EDP_REC_ACCOUNT);
        $gateway->setSecretKey(IdramConstants::SECRET_KEY);
        $gateway->setParameter('transactionId', $request->get('orderId'));

        $purchase = $gateway->completePurchase()->send();

        if ($purchase->isSuccessful()) {
            $donation = Donation::where('order_id', $purchase->getOrderNumberReference())->first();
            abort_if(!$donation, 404);

            $this->successIdram($donation);
        }
        echo 'OK';

        $this->failedIdram($donation);

    }

    public function failedIdram($donation)
    {
        if (Auth::check()){
            $user = Auth::user();
            try {
                Mail::to($user->email)->send(new NewFailedPayment($user));
            }catch (\Exception $e){
                return redirect()->to('/');
            }
        }else{
            $user = $donation;
            try {
                Mail::to($user->email)->send(new NewFailedPayment($user));
            }catch (\Exception $e){
                return redirect()->to('/');
            }
        }
        $url = 'dprvoci-tchamphan';
        return $url;
    }

    public function successIdram($donation)
    {
        $donation->update(['status' => 1]);

        if ($donation->fundraiser_id) {
            $fundraiser = Fundraiser::withTrashed()->where('id', $donation->fundraiser_id)->first();
            if ($fundraiser) {
                $fundraiser->update(['collected' => (int)$donation->amount + (int)$fundraiser->collected]);
            }
        }
        if ($donation->gift_id && Auth::check())
        {
            $user = Auth::user();
            try {
                Mail::to($user->email)->send(new NewGiftPayment($user,$donation));
            }catch (\Exception $e){
                return redirect()->to('/');
            }
        }else{
            try {
                Mail::to($donation->email)->send(new newUnregisteredDonation($donation));
            }catch (\Exception $e){
                return redirect()->to('/');
            }
        }

        //$donation->update(['mdorder' => $request->get('orderId'), 'status' => 1]);


        return $donation;
    }
}
