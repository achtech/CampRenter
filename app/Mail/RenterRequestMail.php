<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RenterRequestMail extends Mailable
{
    use Queueable, SerializesModels;
    public $client;
    public $camper;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client, $camper)
    {
        $this->client = $client;
        $this->camper = $camper;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend.emails.bookingRenter');
    }
}
