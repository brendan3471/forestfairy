<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Review;
use Illuminate\Support\Facades\Log;

class ReviewController extends Controller
{
    /**
     * Show the review form if the token is valid.
     */
    public function write(Request $request)
    {
        $token = $request->query('token');

        if (!$token) {
            abort(403, 'A valid token is required to leave a review.');
        }

        $order = Order::where('review_token', $token)->first();

        if (!$order) {
            abort(403, 'This review link is invalid or has already been used.');
        }

        $order->load('items');

        return view('reviews.write', compact('order', 'token'));
    }

    /**
     * Submit reviews for the items in the order.
     */
    public function submit(Request $request)
    {
        $request->validate([
            'token' => 'required|string',
            'reviews' => 'required|array',
            'reviews.*.product_slug' => 'required|string',
            'reviews.*.rating' => 'required|integer|min:1|max:5',
            'reviews.*.comment' => 'nullable|string|max:5000',
        ]);

        $order = Order::where('review_token', $request->token)->first();

        if (!$order) {
            abort(403, 'This review link is invalid or has already been used.');
        }

        // Save review for each product submitted
        foreach ($request->reviews as $rev) {
            Review::create([
                'order_id' => $order->id,
                'product_slug' => $rev['product_slug'],
                'rating' => (int) $rev['rating'],
                'reviewer_name' => $order->customer_name,
                'comment' => $rev['comment'] ?? null,
                'status' => 'pending', // Moderation queue
            ]);
        }

        // Clear the token so it cannot be used again
        $order->review_token = null;
        $order->save();

        return view('reviews.success');
    }
}
