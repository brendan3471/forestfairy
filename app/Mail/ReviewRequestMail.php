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
        
        // Extract first name from customer_name
        $nameParts = explode(' ', trim($order->customer_name));
        $this->firstName = $nameParts[0] ?? 'there';

        // Find the first purchased product slug to link the review button
        $firstItem = $order->items()->first();
        $productSlug = $firstItem ? $firstItem->product_slug : '';

        if ($productSlug && $productSlug !== 'unknown') {
            $this->reviewUrl = url("/shop/{$productSlug}#review-policy-link");
        } else {
            $this->reviewUrl = url("/shop");
        }
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
