<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class newUnregisteredDonation extends Mailable
{
    use Queueable, SerializesModels;
    public $data,$subject,$donation;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($donation)
    {
        $this->donation = $donation;
        $this->subject = 'Շնորհակալություն նվիրատվության համար:';

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->view('emails.newUndregisteredDonation');
    }
}
