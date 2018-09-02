<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;
    /**
     * @var
     */
    private $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        //
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('no-reply@guard-1.org')
            ->subject('Réinitialisation de votre mot de passe')
            ->view('email.reset', ['token' => $this->token])
            ->text('email.reset-txt', ['token' => $this->token]);
    }
}
