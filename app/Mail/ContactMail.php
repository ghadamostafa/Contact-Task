<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    public $details;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        $this ->details = $details;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email='test.laravel77@gmail.com';
        $this->subject('Message from Contact us page');
        return $this->from($email)->view('contactus::emails.ContactMail');
    }
}
