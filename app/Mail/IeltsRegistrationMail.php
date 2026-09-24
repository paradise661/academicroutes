<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class IeltsRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->subject('New IELTS Class Registration')
                    ->view('emails.ielts-registration')
                    ->with('data', $this->data);
    }
}
