<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Subscribe extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($info, $email, $pass)
    {
        $this->info = $info;
        $this->email = $email;
        $this->pass = $pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Your ODRS account has been created!');

        return $this->markdown('emails.subscribers', [
            'name' => $this->info['first_name'] . ' ' . $this->info['last_name'],
            'email' => $this->email,
            'password' => $this->pass,
        ]);
    }
}
