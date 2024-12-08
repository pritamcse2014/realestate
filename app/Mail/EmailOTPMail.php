<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EmailOTPMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $randomOTP;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $randomOTP)
    {
        $this->user = $user;
        $this->randomOTP = $randomOTP;
    }

    public function build()
    {
        // $email = $this->markdown('email.send_otp_mail')->subject(config('app.name') . ', Send Email O T P Mail ');
        $email = $this->markdown('email.send_otp_mail');
        return $email;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Send Email O T P Mail',
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
