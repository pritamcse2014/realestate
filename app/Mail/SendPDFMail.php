<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendPDFMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $filePath;
    public $fileUrl;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $filePath, $fileUrl)
    {
        $this->user = $user;
        $this->filePath = $filePath;
        $this->fileUrl = $fileUrl;
    }

    public function build()
    {
        // $email = $this->markdown('email.send_pdf_mail')->subject(config('app.name') . ', Send P D F Mail ');
        $email = $this->markdown('email.send_pdf_mail');

            if (!empty($this->fileUrl)) {
                $email->attach($this->fileUrl);
            }
        return $email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send P D F Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.name',
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
}
