<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegisterMail extends Mailable
{
    use Queueable, SerializesModels;

    public $correoPrueba;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($correoPrueba)
    {
        $this->correoPrueba = $correoPrueba;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.register_mail_confirmation');
    }
}
