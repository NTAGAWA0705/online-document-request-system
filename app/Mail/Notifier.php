<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Notifier extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $message, $subject, $student_name, $student_email;
    public function __construct($message, $recipient_info)
    {
        $this->message = $message['message'];
        $this->subject = $message['subject'];
        $this->student_name = $recipient_info[0];
        $this->student_email = $recipient_info[1];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $this->subject($this->message);

        return $this->markdown('emails.notifier', [
            'message' => $this->message,
            'subject' => $this->subject,
            'name' => $this->student_name,

        ]);
    }
}
