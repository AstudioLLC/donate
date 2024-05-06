<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newManuallyPayment extends Mailable
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
        $this->subject = 'Manually Payment';

        $this->user = $user;
        $this->data = [
            'body' => ' Հարգելի '.$donation->fullname.',
                        <br> <br>
                        շնորհակալություն նվիրատվության համար:
                        Ձեր աջակցությունը շատ կարևոր է, այն կօգնի բարելավել առավել խոցելի երեխաների և նրանց ընտանիքների կյանքը:
                        <br> <br>
                        Նվիրատվության գումարը՝ '.$donation->amount.' դրամ
                        Վճարման ամսաթիվը '.$donation->created_at .  "\n".'
                        <br> <br>
                        Հարգանքով՝ Վորլդ Վիժն Հայաստան

                        <br>
                        Dear '.$donation->fullname.',
                        <br> <br>
                        Thank you for your donation!
                        We appreciate your contribution. Your generosity will directly benefit most vulnerable children and their families.
                        <br> <br>
                        Donation amount '.$donation->amount.' AMD
                        Payment date '.$donation->created_at .  "\n".'
                        <br> <br>
                        Best Regards, World Vision Armenia',
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view('emails.newManuallyPayment');
    }
}
