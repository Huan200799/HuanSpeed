<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMailAcceptOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public function __construct()
    {

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mailadmin = config('constraint.mail.admin');
        $name = config('constraint.mail.name');
        return $this->from($mailadmin, $name)->subject('Mail Accept Order '.date('d-m-Y'))->view('email/mailaccept');
    }
}
