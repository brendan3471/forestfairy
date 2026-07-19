<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Str;

class Order extends Model
{
    protected $fillable = [
        'stripe_session_id',
        'customer_email',
        'customer_phone',
        'customer_name',
        'total_amount',
        'currency',
        'payment_status',
        'shipping_status',
        'shipping_address',
        'shipping_amount',
        'tracking_number',
        'tracking_url',
        'label_url',
        'consignment_id',
        'review_requested_at',
        'review_token',
    ];

    /**
     * Boot the model.
     */
    protected static function booted()
    {
        static::creating(function ($order) {
            $order->review_token = Str::random(32);
        });
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
