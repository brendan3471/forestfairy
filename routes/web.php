<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\WholesaleController;
use App\Models\Review;

Route::get('/', function () {
    return view('home');
});

Route::get('/shop', function () {
    $stocks = \App\Models\ProductStock::getAllKeyedBySku();
    return view('shop', compact('stocks'));
});

Route::get('/shop/{slug}', function ($slug) {
    $products = config('products');
    $product  = $products[$slug] ?? null;
    if (! $product) {
        abort(404);
    }
    
    // Query approved reviews from database (starting from scratch)
    $dbReviews = Review::where('product_slug', $slug)
        ->where('status', 'approved')
        ->latest()
        ->get();
        
    $reviewsCount = $dbReviews->count();
    $averageRating = $reviewsCount > 0 ? round($dbReviews->avg('rating'), 1) : 0;
    
    $stocks = \App\Models\ProductStock::getAllKeyedBySku();

    return view('product', compact('product', 'slug', 'dbReviews', 'reviewsCount', 'averageRating', 'stocks'));
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/blog/{slug}', function ($slug) {
    if ($slug === 'the-art-of-gifting-nz-honey-collections') {
        return view('blog.the-art-of-gifting-nz-honey-collections');
    }
    if ($slug === 'regional-honey-profiles') {
        return view('blog.regional-honey-profiles');
    }
    if ($slug === 'raw-vs-commercial') {
        return view('blog.raw-vs-commercial');
    }
    if ($slug === 'the-art-of-labeling') {
        return view('blog.the-art-of-labeling');
    }
    return redirect('/blog');
});

Route::get('/honey-questions', function () {
    return view('honey-questions');
});

Route::get('/honey-purity-pricing-faq', function () {
    return view('honey-purity-pricing-faq');
});

Route::get('/our-testing', function () {
    return view('our-testing');
});

Route::get('/review-policy', function () {
    return view('review-policy');
});

Route::get('/privacy-policy', function () {
    return view('privacy-policy');
});

Route::get('/sitemap', function () {
    return view('sitemap');
});

Route::get('/terms-conditions', function () {
    return view('terms-conditions');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/contact', [ContactController::class, 'send']);

Route::get('/wholesale', [WholesaleController::class, 'index'])->name('wholesale.index');
Route::post('/wholesale', [WholesaleController::class, 'submit'])->name('wholesale.submit');

Route::get('/reviews/write', [ReviewController::class, 'write'])->name('reviews.write');
Route::post('/reviews/submit', [ReviewController::class, 'submit'])->name('reviews.submit');

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
Route::get('/login', fn () => redirect()->route('admin.login'))->name('login');
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'authenticate'])->name('admin.authenticate');
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/orders', [AdminController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [AdminController::class, 'show'])->name('orders.show');
    Route::post('/orders/{order}/status', [AdminController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::post('/orders/{order}/generate-label', [AdminController::class, 'generateLabel'])->name('orders.generateLabel');
    Route::get('/orders/{order}/track', [AdminController::class, 'trackOrder'])->name('orders.track');

    // Reviews moderation
    Route::get('/reviews', [AdminController::class, 'reviews'])->name('reviews.index');
    Route::post('/reviews/{review}/approve', [AdminController::class, 'approveReview'])->name('reviews.approve');
    Route::post('/reviews/{review}/reject', [AdminController::class, 'rejectReview'])->name('reviews.reject');
    Route::post('/reviews/{review}/toggle-feature', [AdminController::class, 'toggleFeature'])->name('reviews.toggle-feature');

    // Stock management
    Route::get('/stock', [AdminController::class, 'stockIndex'])->name('stock.index');
    Route::post('/stock', [AdminController::class, 'updateStock'])->name('stock.update');
});

