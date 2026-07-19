<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ReviewRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $firstName;
    public $reviewUrl;

    /**
     * Create a new message instance.
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
        
        // Extract first name (skipping single-character initials like "J" or "J.")
        $nameParts = array_values(array_filter(explode(' ', trim($order->customer_name))));
        $firstName = 'there';
        if (count($nameParts) > 0) {
            $firstName = $nameParts[0];
            if (strlen(preg_replace('/[^a-zA-Z]/', '', $firstName)) <= 1 && isset($nameParts[1])) {
                $firstName = $nameParts[1];
            }
        }
        $this->firstName = ucfirst($firstName);

        // Set the tokenized review link
        $this->reviewUrl = route('reviews.write', ['token' => $order->review_token]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'How did you like your Forest Fairy Honey?',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.review_request',
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
