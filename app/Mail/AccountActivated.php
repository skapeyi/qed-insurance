<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AccountActivated extends Mailable
{
    use Queueable, SerializesModels;
    public $name;

    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.accounts.activated')
        ->from(env('SUPPORT_EMAIL'),env('APP_NAME'))
        ->bcc(env('SUPPORT_EMAIL'))
        ->subject('Account Changes');
    }
}
