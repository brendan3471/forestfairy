<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
