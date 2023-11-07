<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class Message extends Mailable
{
    use Queueable, SerializesModels;
    public $mess;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mess)
    {
        $this->mess = $mess;
    }

    /**
     * Get the message envelope.
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Send Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content()
    {
        return new Content(
            view: 'admin_part.email.mail_templates.mail_templete_outbox',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }

    public function build()
    {
        return $this->view('emails.main', ['mess' => $this->mess]);
    }
}
