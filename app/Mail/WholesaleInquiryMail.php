<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WholesaleInquiryMail extends Mailable
{
    use Queueable, SerializesModels;

    public array $data;

    /**
     * Create a new message instance.
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $contactName = $this->data['contact_name'] ?? 'Wholesale Lead';
        $email = $this->data['email'] ?? config('mail.from.address');

        return new Envelope(
            from: new \Illuminate\Mail\Mailables\Address(config('mail.from.address'), $contactName),
            replyTo: [new \Illuminate\Mail\Mailables\Address($email, $contactName)],
            subject: 'New Wholesale Inquiry from ' . ($this->data['business_name'] ?? 'Bulk Lead'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.wholesale_inquiry',
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
