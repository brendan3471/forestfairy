<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;

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
// Admin Panel
// ---------------------------------------------------------------------------
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/orders', [AdminController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [AdminController::class, 'show'])->name('orders.show');
    Route::post('/orders/{order}/status', [AdminController::class, 'updateStatus'])->name('orders.updateStatus');
});

