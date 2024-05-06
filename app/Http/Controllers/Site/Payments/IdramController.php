<?php

namespace App\Http\Controllers\Site\Payments;

use App\Http\Controllers\Site\BaseController;
use App\Mail\NewFailedPayment;
use App\Mail\newUnregisteredDonation;
use App\Models\Donation;
use Illuminate\Http\Request;
use App\Traits\Idram;
use Illuminate\Support\Facades\Mail;

class IdramController extends BaseController
{
    use Idram;

    public function result(Request $request)
    {
        $this->resultIdram($request);

    }

    public function success()
    {
        $donation = Donation::where('order_id',$_REQUEST['EDP_BILL_NO'])->first();
        $donation->update(['status' => '1','project_type' => 'Success IDram']);
        try {
            Mail::to($donation->email)->send(new newUnregisteredDonation($donation));
        }catch (\Exception $e){
            return redirect()->route('page', ['url' => '/'])->with('success_payment' , 'true');
        }

        return redirect()->route('page', ['url' => '/'])->with('success_payment' , 'true');
    }

    public function failed()
    {
        $donation = Donation::where('order_id',$_REQUEST['EDP_BILL_NO'])->first();
        $donation->update(['status' => '0','project_type' => 'Failed IDram']);
        try {
            Mail::to($donation->email)->send(new NewFailedPayment($donation));
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->back();

    }
}
