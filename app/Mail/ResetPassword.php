<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    private $data;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return ResetPassword
     */
    public function build()
    {
        return $this->subject( 'Գաղտնաբառի վերականգնում - Recover Your Password  ' )
            ->view('emails.resetPassword', $this->data);
        //return $this->view('view.name');
    }
}
