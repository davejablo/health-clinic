<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserWelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $login;
    private $name;

    public function __construct($login, $name)
    {
        $this->login = $login;
        $this->name = $name;
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->from('etrainer.proo@gmail.com', 'Health-Clinic')
            ->subject('Health-Clinic Registration')
            ->markdown('emails.welcome-email', ['login' => $this->login, 'name' => $this->name]);
    }
}
