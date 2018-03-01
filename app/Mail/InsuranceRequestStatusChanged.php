<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InsuranceRequestStatusChanged extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $ref_no;

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
        return $this->markdown('emails.requests.statusChanged')
        ->from(env('SUPPORT_EMAIL'),env('APP_NAME'))
        ->subject('Status of Your Request');
    }
}
