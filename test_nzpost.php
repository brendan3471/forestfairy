<?php

use App\Models\Order;
use App\Models\OrderItem;
use App\Services\NzPostService;
use Illuminate\Support\Facades\Schema;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Testing NZ Post Label API...\n";

try {
    $nzPost = app(NzPostService::class);
    
    // Create a mock shipment data
    $shipmentData = [
    'carrier'            => 'PACE',
    'orientation'        => 'LANDSCAPE',
    'format'             => 'PDF',
    'sender_reference_1' => 'TestOrder001',

    'sender_details' => [
        'name'         => 'Forest Fairy Honey',
        'phone'        => '6421996820', // your real phone
        'email'        => 'accounts@forestfairyhoney.co.nz', // your real email
        'company_name' => 'Forest Fairy Honey',
    ],

    'pickup_address' => [
        'street_number' => '1',
        'street'        => 'Your Street',
        'suburb'        => 'Your Suburb',
        'city'          => 'Your City',
        'country_code'  => 'NZ',
        'postcode'      => '0000',
    ],

    'receiver_details' => [
        'name'  => 'Test Customer',
        'email' => 'test@example.com',
        'phone' => '6490000002',
    ],

    'delivery_address' => [
        'is_collection' => false,
        'street_number' => '100',
        'street'        => 'Queen Street',
        'suburb'        => 'Auckland Central',
        'city'          => 'Auckland',
        'country_code'  => 'NZ',
        'postcode'      => '1010',
    ],

    'parcel_details' => [
        [
            'service_code'     => 'CPOLE',
            'return_indicator' => 'OUTBOUND',
            'description'      => 'Honey Order',
            'dimensions'       => [
                'weight_kg' => 0.95,
                'length_cm' => 20,
                'width_cm'  => 15,
                'height_cm' => 10,
            ],
        ]
    ],
];

    echo "Sending request to NZ Post (" . config('services.nzpost.env') . ")...\n";
    
    $shipment = $nzPost->createShipment($shipmentData);
    
    echo "SUCCESS!\n";
    echo "Consignment ID: " . ($shipment['consignment_id'] ?? 'N/A') . "\n";
    echo "Tracking Number: " . ($shipment['tracking_number'] ?? 'N/A') . "\n";
    echo "Label URL: " . ($shipment['label_url'] ?? 'N/A') . "\n";

} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    if (str_contains($e->getMessage(), '401')) {
        echo "Tip: Check your NZPOST_CLIENT_ID and NZPOST_CLIENT_SECRET in .env\n";
    }
}
