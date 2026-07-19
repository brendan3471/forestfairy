<?php

namespace App\Mail;

use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $firstName;
    public $items;
    public $shippingAddressDecoded;

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

        // Load items
        $this->items = $order->items;

        // Decode shipping address
        $this->shippingAddressDecoded = $order->shipping_address ? json_decode($order->shipping_address, true) : null;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Order Confirmed - Order #' . $this->order->id . ' | Forest Fairy Honey',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.order_confirmation',
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
