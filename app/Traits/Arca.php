<?php

namespace App\Traits;

use App\Mail\NewBindingPayment;
use App\Mail\newCountablePayment;
use App\Mail\NewFailedPayment;
use App\Mail\NewGiftPayment;
use App\Mail\newManuallyPayment;
use App\Mail\newUnregisteredDonation;
use App\Models\Donation;
use App\Models\Fundraiser;
use App\Models\Sponsor;
use App\Models\Traits\Relationships\UserRelationships;
use App\Models\User;
use App\Models\UserOptions;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Omnipay\Omnipay;
use App\Constants\Arca as ArcaConstants;

trait  Arca
{
    public function createArca(int $orderId)
    {
        $donation = Donation::where('order_id', $orderId)->with('gift','fundraiser','children','sponsor.options')->first();
        if($donation->is_binding){
            $desc = 'First Donation for Binding payment | Sponsor ID - LS_'.$donation->sponsor->options->sponsor_id ?? null . 'Child ID - ' . $donation->children->child_id ?? null;
        }elseif ($donation->gift_id){
           'Gift | ' . $desc = $donation->gift->title ?? '';
        }elseif ($donation->fundraiser_id){
            'Fundraiser | ' . $desc = $donation->fundraiser->title ?? '';
        }elseif(isset($donation->project_type)){
            $desc = $donation->project_type ?? '';
        }else{
            $desc = 'Child Sponsorship Manual ' . 'Sponsor ID - ' . $donation->sponsor->options->sponsor_id ?? 'Anonymous' . 'Child ID - ' . $donation->children->child_id ?? ' not selected';
        }
        abort_if(!$donation, 404);

        $gateway = Omnipay::create('Arca');

        $gateway->setUsername(ArcaConstants::ARCA_USERNAME);
        $gateway->setPassword(ArcaConstants::ARCA_PASSWORD);
//        $gateway->setTestMode(true);
        $gateway->setParameter('returnUrl', route('payment.arca.result'));
        $gateway->setParameter('amount', $donation->amount);
        $gateway->setParameter('description',$desc);
        $gateway->setParameter('TransactionId', $orderId);
        $gateway->setParameter('jsonParams',json_encode(['FORCE_3DS2' => true]));
        if ($donation->is_binding == 1) {
            $gateway->setParameter('clientId', $donation->sponsor_id .'-'. time());
        }
        $purchase = $gateway->purchase()->send();

        if ($purchase->isRedirect()) {
            return $purchase->redirect();
        }

        $this->failedArca($donation);
        //TODO redirect to response page with failed
        dd($purchase->getMessage(), $purchase->getCode());
        dd(1111);
    }

    public function resultArca(Request $request)
    {
        $gateway = Omnipay::create('Arca');
        $gateway->setUsername(ArcaConstants::ARCA_USERNAME);
        $gateway->setPassword(ArcaConstants::ARCA_PASSWORD);
//        $gateway->setTestMode(true);
        $gateway->setParameter('transactionId', $request->get('orderId'));
        $purchase = $gateway->getOrderStatus()->send();

        if ($purchase->isSuccessful()) {
            //$donation = Donation::where('order_id', $purchase->getOrderNumberReference())->first();
            $donation = Donation::where('order_id', $purchase->getOrderNumberReference())->with('gift','fundraiser','children')->first();
            DB::table('donations')->where('order_id', $purchase->getOrderNumberReference())->update(['mdorder' => $request->get('orderId'), 'status' => 1]);
            abort_if(!$donation, 404);
            if ($donation->fundraiser_id) {
                $fundraiser = Fundraiser::withTrashed()->where('id', $donation->fundraiser_id)->first();
                if ($fundraiser) {
                    $fundraiser->update(['collected' => (int)$donation->amount + (int)$fundraiser->collected]);
                }
            }

            $data = $purchase->getData();
            if ($donation->is_binding == 1) {

                UserOptions::where('user_id',$donation->sponsor_id)->update(['sponsor_id' => 'LS_' . $donation->sponsor_id]);
                DB::table('donations')->where('order_id', $purchase->getOrderNumberReference())->update(['mdorder' => $request->get('orderId'), 'status' => 1,'bindingId' => $data['bindingId'],'errorCode' =>$data['errorCode']]);
                DB::table('bindings')->Insert(['mdOrder' => $request->get('orderId'),'orderId' => $donation->order_id,'bindingId' => $data['bindingId'],'user_id' => $donation->sponsor_id,'sponsor_id' => auth()->user()->options->sponsor_id,'clientId' => $data['clientId'],'amount' => (int)$donation->amount,'created_at' => Carbon::now(),'updated_at' => Carbon::now(),'must_be' => Carbon::now()->addMonth()]);
                try {
                    Mail::to($donation->email)->send(new NewBindingPayment($donation));
                }catch (\Exception $e){
                    return redirect()->to('/');
                }
            }else{
                DB::table('donations')->where('order_id', $purchase->getOrderNumberReference())->update(['mdorder' => $request->get('orderId'), 'status' => 1,'errorCode' =>$data['errorCode']]);
                if ($donation->sponsor_id !== null){
                    UserOptions::where('user_id',$donation->sponsor_id)->where('sponsor_id','like','%' . 'AA'. '%')->update(['sponsor_id' => 'TS_' . $donation->sponsor_id]);
                }
                if ($donation->gift_id)
                {
                    try {
                        return Mail::to($donation->email)->send(new NewGiftPayment($donation));
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
                    //Mail::to($donation->email)->send(new newUnregisteredDonation($donation));

            }

            //$donation->update(['mdorder' => $request->get('orderId'), 'status' => 1]);
            return $donation;
        }
        $donation = DB::table('donations')->where('order_id', $purchase->getOrderNumberReference())->first();

        try {
            return Mail::to($donation->email)->send(new NewFailedPayment($donation));
        }catch (\Exception $e){
            return redirect()->to('/');
        }


    }

    public static function failedArca($donation)
    {
        Mail::to($donation->email)->send(new NewFailedPayment($donation));
        $url = 'dprvoci-tchamphan';
        return $url;
    }

    public static function successArca($donation)
    {
        $urls = session()->get('paymentUrls');
        dd($urls);
        $url = 'give-a-gift';
        return $url;
    }

}
