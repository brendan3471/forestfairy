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
        'recipient' => [
            'name'         => 'Test Customer',
            'email'        => 'test@example.com',
            'street'       => '100 Queen Street',
            'suburb'       => 'Auckland Central',
            'city'         => 'Auckland',
            'postcode'     => '1010',
        ],
        'sender' => config('services.nzpost.sender_details'),
        'parcel' => [
            'weight' => 0.95, // 950g
            'length' => 20,
            'width'  => 15,
            'height' => 10,
        ],
    ];

    echo "Sending request to NZ Post (" . config('services.nzpost.env') . ")...\n";
    
    $shipment = $nzPost->createShipment($shipmentData);
    
    echo "SUCCESS!\n";
    echo "Tracking Number: " . ($shipment['tracking_number'] ?? 'N/A') . "\n";
    echo "Label URL: " . ($shipment['label_url'] ?? 'N/A') . "\n";

} catch (\Exception $e) {
    echo "ERROR: " . $e->getMessage() . "\n";
    if (str_contains($e->getMessage(), '401')) {
        echo "Tip: Check your NZPOST_CLIENT_ID and NZPOST_CLIENT_SECRET in .env\n";
    }
}
