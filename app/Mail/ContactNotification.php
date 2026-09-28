<?php

namespace App\Mail;

use Carbon\CarbonInterface;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactNotification extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public string $name,
        public string $email,
        public string $inquiryMessage,
        public CarbonInterface $submittedAt,
    ) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: sprintf(
                '[Lawrence Portfolio] New message from %s — %s',
                $this->name,
                $this->submittedAt->copy()->setTimezone('Asia/Manila')->format('M j, Y g:i A'),
            ),
            replyTo: [new Address($this->email, $this->name)],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'mail.contact-notification',
            text: 'mail.contact-notification-text',
        );
    }
}
