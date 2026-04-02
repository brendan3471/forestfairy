<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/shop', function () {
    return view('shop');
});

Route::get('/shop/{slug}', function ($slug) {
    $products = [
        'omanawa-falls-creamed-honey' => [
            'name' => 'Omanawa Falls Creamed Honey',
            'price' => '32.90',
            'rating' => '5.0',
            'reviews' => 42,
            'description' => 'A beautifully textured creamed honey from the pristine Omanawa Falls region. This honey is cold-harvested and slowly creamed to preserve its natural enzymes and delicate floral notes.',
            'benefits' => ['Smooth creamed texture', 'Cold-harvested', 'Regional NZ origin', '100% Raw'],
            'weight' => '900g',
            'image' => 'omanawa-falls',
        ],
        'mamaku-creamed-honey' => [
            'name' => 'Mamaku Creamed Honey',
            'price' => '34.90',
            'rating' => '4.9',
            'reviews' => 56,
            'description' => 'Sourced from the lush Mamaku ranges, this creamed honey offers a rich, velvety consistency and a complex sweetness that reflects the native forest flora of the region.',
            'benefits' => ['Velvety consistency', 'Native forest flora', 'Unfiltered & Raw', 'NZ Certified'],
            'weight' => '950g',
            'image' => 'mamaku',
        ],
        'otumoetai-summer-harvest-creamed-honey' => [
            'name' => 'Ōtumoetai Summer Harvest Creamed Honey',
            'price' => '29.90',
            'rating' => '4.8',
            'reviews' => 38,
            'description' => 'Captured during the height of the New Zealand summer, this harvest from Ōtumoetai is light, floral, and perfectly creamed for a spreadable finish that the whole family will love.',
            'benefits' => ['Seasonal summer harvest', 'Spreadable texture', 'Floral & Light', 'Pesticide-free'],
            'weight' => '950g',
            'image' => 'otumoetai',
        ],
        'rewarewa-honey' => [
            'name' => 'Rewarewa Honey',
            'price' => '36.90',
            'rating' => '5.0',
            'reviews' => 29,
            'description' => 'A premium Rewarewa honey with a deep, malty flavour and dark amber hue. Harvested from the native NZ Honeysuckle tree, this honey is prized for its high antioxidant properties.',
            'benefits' => ['Dark amber hue', 'Native NZ flora', 'Malty flavor profile', 'High antioxidants'],
            'weight' => '950g',
            'image' => 'rewarewa',
        ],
    ];
    $product = $products[$slug] ?? null;
    if (!$product) {
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
