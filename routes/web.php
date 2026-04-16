<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ConnectController;

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

// ---------------------------------------------------------------------------
// Cart
// ---------------------------------------------------------------------------
Route::get('/cart',                    [CartController::class, 'show'])->name('cart.show');
Route::post('/cart/add/{slug}',        [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{slug}',     [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{slug}',     [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout',          [CartController::class, 'checkout'])->name('cart.checkout');

// ---------------------------------------------------------------------------
// Stripe Connect
// ---------------------------------------------------------------------------
Route::get('/connect/dashboard',                          [ConnectController::class, 'dashboard'])->name('connect.dashboard');
Route::post('/connect/accounts',                          [ConnectController::class, 'createAccount'])->name('connect.createAccount');
Route::post('/connect/accounts/{accountId}/onboard',      [ConnectController::class, 'onboard'])->name('connect.onboard');
Route::get('/connect/onboard/return',                     [ConnectController::class, 'onboardReturn'])->name('connect.onboard.return');
Route::get('/connect/onboard/refresh',                    [ConnectController::class, 'onboardRefresh'])->name('connect.onboard.refresh');
Route::post('/connect/accounts/{accountId}/products',     [ConnectController::class, 'createProduct'])->name('connect.createProduct');
Route::get('/connect/store/{accountId}',                  [ConnectController::class, 'storefront'])->name('connect.storefront');
Route::post('/connect/store/{accountId}/buy',             [ConnectController::class, 'buy'])->name('connect.buy');
Route::get('/connect/success',                            [ConnectController::class, 'success'])->name('connect.success');

// Connect webhook — CSRF exempt (see bootstrap/app.php), receives thin events
Route::post('/connect/webhook',                           [ConnectController::class, 'webhook'])->name('connect.webhook');

