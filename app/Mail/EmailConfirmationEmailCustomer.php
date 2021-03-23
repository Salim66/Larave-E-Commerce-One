<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailConfirmationEmailCustomer extends Mailable
{
    use Queueable, SerializesModels;
    public $verify_details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($verify_details)
    {
        $this->verify_details = $verify_details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('frontend.mails.customer-email-verify');
    }
}
