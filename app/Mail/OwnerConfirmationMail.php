<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OwnerConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $owner;
    public $camper;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($owner, $camper)
    {
        $this->owner = $owner;
        $this->camper = $camper;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend.emails.confirmationBookingOwner');
    }
}
