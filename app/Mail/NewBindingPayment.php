<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewBindingPayment extends Mailable
{
    public $data,$subject;
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($donation)
    {
        $this->subject = 'Monthly Recurring Payment';

        $this->data = [
            'body' => '
                        Հարգելի '.$donation->fullname.' , Դուք ընտրել եք շարունակական վճարման տարբերակը, որի շրջանակում Ձեզնից յուրաքանչյուր ամիս գանձվելու է '.$donation->amount.' դրամ:
                        Եթե ցանկանում եք անջատել շարունակական վճարը, գրեք մեզ worldvision_armenia@wvi.org էլ. հասցեով։
                        Հարգանքով՝
                        Վորլդ Վիժն Հայաստան
                        ',
            'body1' => 'Dear '.$donation->fullname.',
                        You have chosen the ‘recurring payment’ option. Please note, that you will be charged '.$donation->amount.' AMD monthly. 
                        If you want to stop the ‘recurring payment’, please contact us via email: worldvision_armenia@wvi.org
                        Best regards,
                        World Vision Armenia '
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view('emails.newBindingPayment');
    }
}
