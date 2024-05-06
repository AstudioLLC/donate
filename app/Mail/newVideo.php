<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newVideo extends Mailable
{
    use Queueable, SerializesModels;

    public $data,$user;
    /**
    * Create a new message instance.
    *
    * @return void
    */
    public function __construct($user)
    {
        $this->user = $user;

        $this->data = [
//            'title' => 'Hello From Donate.am',
            'body' => ' Դուք ստացել եք նամակ Ձեր հովանավորած երեխայից: <br>
                        Այն տեսնելու համար մուտք գործեք հետևյալ հղումով՝ http://donate.am/am/login <br>
                        Հարգանքով՝
                        Վորլդ Վիժն Հայաստան',

            'body1' => 'You have a new letter from your sponsored child. <br>
                        Please find the letter following this link: http://donate.am/en/login <br>
                        Best Regards,
                        World Vision Armenia',
        ];
    }

    /**
    * Build the message.
    *
    * @return $this
    */
    public function build()
    {
        return $this->view('emails.newVideo');
    }
}
