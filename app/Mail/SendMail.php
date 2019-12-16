<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * SendMail class, extends Mailable to build message with a view and datas
 */
class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Private attribute who contains datas like company name or message to display
     */
    private $data;

    /**
     * Create a new message instance.
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message
     * @return $this
     */
    public function build()
    {
        return $this->from('contact@fidarc.ch')->subject('Message from FidArc')->view('mail.company_mail')->with('data', $this->data);
    }
}
