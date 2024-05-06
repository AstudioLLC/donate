<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newSponsorMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->data = [
            'title' => 'Letter from your sponsored child.',
            'body' => '  Դուք ստացել եք նամակ Ձեր հովանավորած երեխայից:
                        "\n"
                         Այն տեսնելու համար մուտք գործեք հետևյալ հղումով http://donate.am/am/login
                         "\n"
                         Հարգանքով՝ Վորլդ Վիժն Հայաստան
                        ',
            "\n",
            'body_en' => '   You have a new letter from your sponsored child.
                             "\n"
                             Please find the letter following this link. http://donate.am/en/login
                             "\n"
                             Best Regards, World Vision Armenia
                         '
        ];

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Letter from child - Նամակ երեխայից')->view('emails.newSponsorMessage');
    }
}


