<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('stripe_session_id')->unique();
            $table->string('customer_email');
            $table->string('customer_name')->nullable();
            $table->integer('total_amount'); // in cents
            $table->string('currency')->default('nzd');
            $table->string('payment_status')->default('pending');
            $table->string('shipping_status')->default('pending');
            $table->text('shipping_address')->nullable();
            $table->integer('shipping_amount')->default(0); // in cents
            $table->string('tracking_number')->nullable();
            $table->string('tracking_url')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
