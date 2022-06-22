<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyYourAcount extends Mailable
{
    use Queueable, SerializesModels;
    public  $dato;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $dato)
    {
        $this->dato=$dato;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.emailVerify');
    }
}
