<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\AddressController;

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

Route::get('/honey-questions', function () {
    return view('honey-questions');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');
Route::post('/checkout/prepare', [CheckoutController::class, 'prepare'])->name('checkout.prepare');

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
Route::post('/cart/update/{key}',     [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{key}',     [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/checkout',          [CartController::class, 'checkout'])->name('cart.checkout');

// ---------------------------------------------------------------------------
// Address
// ---------------------------------------------------------------------------
Route::prefix('address')->group(function () {
    Route::get('/search', [AddressController::class, 'search']);
    Route::get('/details/{addressId}', [AddressController::class, 'details']);
});

// ---------------------------------------------------------------------------
// Admin Panel
// ---------------------------------------------------------------------------
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/orders', [AdminController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [AdminController::class, 'show'])->name('orders.show');
    Route::post('/orders/{order}/status', [AdminController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::post('/orders/{order}/generate-label', [AdminController::class, 'generateLabel'])->name('orders.generateLabel');
    Route::get('/orders/{order}/track', [AdminController::class, 'trackOrder'])->name('orders.track');
});

