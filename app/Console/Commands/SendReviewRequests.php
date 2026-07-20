<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Mail\ReviewRequestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendReviewRequests extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reviews:send-requests';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send post-purchase review request emails to customers who bought honey 10 days ago.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting review request email dispatch...');

        // Query orders that are paid, haven't had a review request, and are at least 10 days old
        $orders = Order::where('payment_status', 'paid')
            ->whereNull('review_requested_at')
            ->where('created_at', '<=', now()->subDays(10))
            ->get();

        $count = $orders->count();
        $this->info("Found {$count} orders eligible for review request.");

        foreach ($orders as $order) {
            try {
                $this->info("Sending review request to {$order->customer_email} for Order #{$order->id}...");
                
                Mail::to($order->customer_email)->send(new ReviewRequestMail($order));

                $order->review_requested_at = now();
                $order->save();

                Log::info("Review request email sent successfully.", [
                    'order_id' => $order->id,
                    'email' => $order->customer_email
                ]);
            } catch (\Exception $e) {
                $this->error("Failed to send review request for Order #{$order->id}: " . $e->getMessage());
                Log::error("Failed to send review request email.", [
                    'order_id' => $order->id,
                    'error' => $e->getMessage()
                ]);
            }
        }

        $this->info('Review request email dispatch complete.');
    }
}
