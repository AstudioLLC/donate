<?php

namespace App\Http\Controllers;


use App\Mail\NewFailedPayment;
use App\Models\Binding;
use App\Models\Children;
use App\Models\Database;
use App\Models\Donation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Mail;
use Omnipay\Omnipay;
use App\Constants\Arca as ArcaConstants;

class BindingController extends Controller
{

    public function checkBindings($active = true)
    {
        $bindings =  Binding::where('active',$active)
            ->where('must_be', '<=', Carbon::now())

            ->get();

        foreach ($bindings as $binding){
            $amount = $binding->amount;
            $clientId = $binding->clientId;
            $bindingId = $binding->bindingId;
            $sponsor_id = $binding->sponsor_id;
            $children_id = $binding->children_id;
            $sponsor = User::where('id',$binding->user_id)->first();

            if (isset($sponsor)){
                $this->createRegisterDo($clientId,$amount,$bindingId,$sponsor,$sponsor_id,$children_id);
            }
        }
    }

    public function createRegisterDo($clientId,$amount,$bindingId,$sponsor,$sponsor_id,$children_id)
    {
        $username = ArcaConstants::ARCA_BINDING_USERNAME;
        $password = ArcaConstants::ARCA_BINDING_PASSWORD;
        $returnUrl = '/';
        $currency = 051;
        $orderNumber = time();

        $gateway = Omnipay::create('Arca');

        $gateway->setUsername($username);
        $gateway->setPassword($password);
        $gateway->setParameter('returnUrl', $returnUrl);
        $gateway->setParameter('amount', $amount);
        $gateway->setParameter('description', 'Binding payment | Sponsor ID - ' . $sponsor_id);
//        $gateway->setParameter('currency', $currency);
        $gateway->setParameter('TransactionId', $orderNumber);
        $gateway->setParameter('jsonParams',json_encode(['FORCE_3DS2' => true]));
        $gateway->setParameter('clientId', $clientId);

        $purchase = $gateway->purchase()->send();
        $data = $purchase->getData();
        $errorCode = $data['errorCode'];
        Donation::create([
            'order_id' => $orderNumber,
            'mdorder' => null,
            'status' => 0,
            'fundraiser_id' => null,
            'gift_id' => null,
            'is_binding' => 1,
            'bindingId' => $bindingId,
            'sponsor_id' => $sponsor->id,
            'children_id' => $children_id ?? null,
            'amount' => (int)$amount,
            'email' => $sponsor->email,
            'fullname' => $sponsor->name,
            'country_id' => null,
            'city' => null,
            'address' => null,
            'phone' => null,
            'card_type' => 'arca',
            'message' => null,
            'message_admin' => null,
            'errorCode' => $errorCode,
        ]);

        if ($purchase->isRedirect()) {
            $orderId = $data['orderId'];

            if ($purchase->isSuccessful()) {
                if (isset($errorCode) && $errorCode == 0 && isset($orderId)) {
                    $url = "https://ipay.arca.am/payment/rest/paymentOrderBinding.do?userName=$username&password=$password&mdOrder=$orderId&bindingId=$bindingId&amount=$amount&currency=$currency&returnUrl=$returnUrl";
                    $this->sendPrivateRequest($url,$errorCode,$bindingId,$orderNumber,$sponsor,$orderId);
                }
            }else {
                $this->failedBinding($errorCode, $bindingId, $orderNumber,$sponsor,$orderId);
            }
        }
    }



    private function sendPrivateRequest($url,$errorCode,$bindingId,$orderNumber,$sponsor,$orderId)
    {
        $client = new Client();
        $res = $client->post($url);
        $result = json_decode($res->getBody());

        if ($result->errorCode === 0 && $result->info !== 'Your order is proceeded, redirecting...'){

            DB::table('donations')->where('order_id',$orderNumber)->update(['mdorder' => $orderId,'project_type'=>'Failed Binding','errorCode' => $errorCode,'status' => 0]);
            DB::table('bindings')->where('bindingId',$bindingId)->update(['updated_at' => Carbon::now(),'must_be' => Carbon::now()->addWeek()]);
        }
        elseif($result->errorCode === 0 && $result->info == 'Your order is proceeded, redirecting...')
        {
            DB::table('donations')
                ->where('order_id',$orderNumber)
                ->update(['mdorder' => $orderId, 'status' => 1, 'project_type'=>'Success Binding','created_at' => Carbon::now()]);
            DB::table('bindings')
                ->where('bindingId',$bindingId)
                ->update(['updated_at' => Carbon::now(),'must_be' => Carbon::now()->addMonth()]);
            return true;
        }


    }

    public function failedBinding($errorCode,$bindingId,$orderNumber,$sponsor,$orderId)
    {
        DB::table('donations')->where('order_id',$orderNumber)->update(['mdorder' => $orderId,'errorCode' => $errorCode,'status' => 0]);
        DB::table('bindings')->where('bindingId',$bindingId)->update(['updated_at' => Carbon::now(),'must_be' => Carbon::now()->addWeek()]);
        $donation = Donation::where('order_id',$orderNumber)->first();
        // Mail::to($sponsor->email)->send(new NewFailedPayment($donation,$sponsor));
        return true;
        //TODO logic when response  failed
    }
}
