<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationMail extends Mailable
{
    use Queueable, SerializesModels;
    public $client;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($client)
    {
        $this->client = $client;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject = 'Confirmation email from:';
        $address = 'support@campunite.com';
        $name = 'Campunite Team';

        return $this->view('frontend.emails.welcome')
            ->from($address, $name)

            ->replyTo($address, $name)
            ->subject($subject)
            ->with(['client' => $this->client]);

    }

}
