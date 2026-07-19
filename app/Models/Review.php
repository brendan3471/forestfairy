<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'order_id',
        'product_slug',
        'rating',
        'reviewer_name',
        'comment',
        'status',
        'featured',
    ];

    protected $casts = [
        'featured' => 'boolean',
    ];

    /**
     * Get the order associated with the review.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
