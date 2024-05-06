<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newCountablePayment extends Mailable
{
    public $data,$user,$subject;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$donation)
    {
        $this->subject = 'Monthly Recurring Payment';
        if (!empty($donation->count)){
            if ($donation->count == 1)
            {
                $hy_count_type = 'ամսական';
                $en_count_type = 'monthly';

            }elseif($donation->count == 3){
                $hy_count_type = 'եռամսյակային';
                $en_count_type = 'quarterly';

            }elseif ($donation->count == 12){
                $hy_count_type = 'տարեկան';
                $en_count_type = 'annually';
            }
        }
        $this->user = $user;
        $this->data = [
            'body' => 'Հարգելի '.$user->name.', Դուք ընտրել եք պարբերեկան վճարման ձեւաչափը, որի
                        շրջանակում Ձեզնից '.$hy_count_type ?? null.' կտրվածքով
                        գանձվելու է '.$donation->amount.' դրամ Ձեր հովանավորած երեխայի՝ '.$donation->children_id ?? null.' համար։ Եթե ցանկանում եք անջատել
                        պարբերական գանձումը, գրեք մեզ worldvision_armenia@wvi.org էլ.
                        հասցեով։
                        Dear '.$user->name.', you just choose ‘recurring payment’ option. Please notice, that,
                        you will be charged '.$donation->amount.' AMD '.$en_count_type ?? null.' for your'
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view('emails.newGiftPayment');
    }
}
