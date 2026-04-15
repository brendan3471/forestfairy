<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;

Route::get('/', function () {
    return view('home');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/shop/{slug}', function ($slug) {
    $products = config('products');
    $product  = $products[$slug] ?? null;
    if (! $product) {
        abort(404);
    }
    return view('product', compact('product', 'slug'));
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/contact', function () {
    return view('contact');
});

// ---------------------------------------------------------------------------
// Stripe Checkout
// ---------------------------------------------------------------------------
Route::post('/checkout/{slug}', [CheckoutController::class, 'createSession'])->name('checkout.create');
Route::get('/checkout/success', [CheckoutController::class, 'success'])->name('checkout.success');
Route::get('/checkout/cancel', [CheckoutController::class, 'cancel'])->name('checkout.cancel');

// Webhook — CSRF exempt (see bootstrap/app.php)
Route::post('/stripe/webhook', [CheckoutController::class, 'webhook'])->name('stripe.webhook');
