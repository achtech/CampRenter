<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class PaymentSuccessRenterMail extends Mailable
{
    use Queueable, SerializesModels;
    public $renter;
    public $camper;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($renter, $camper)
    {
        $this->renter = $renter;
        $this->camper = $camper;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend.emails.paymentSuccessRenterMail');
    }
}
