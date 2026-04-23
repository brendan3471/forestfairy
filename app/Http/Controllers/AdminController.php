<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function login()
    {
        if (Auth::check() && Auth::user()->is_admin) {
            return redirect()->route('admin.orders.index');
        }
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            if (Auth::user()->is_admin) {
                $request->session()->regenerate();
                return redirect()->intended(route('admin.orders.index'));
            }
            Auth::logout();
            return back()->withErrors(['email' => 'Access denied.']);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function index()
    {
        $orders = Order::latest()->paginate(20);
        return view('admin.orders.index', compact('orders'));
    }

    public function show(Order $order)
    {
        $order->load('items');
        return view('admin.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'shipping_status' => 'required|string',
            'tracking_number' => 'nullable|string',
            'tracking_url'    => 'nullable|url',
        ]);

        $order->update($validated);

        return redirect()->back()->with('success', 'Order status updated!');
    }

    /**
     * Generate a shipping label via NZ Post API
     */
    public function generateLabel(Order $order, \App\Services\NzPostService $nzPost)
    {
        try {
            $address = json_decode($order->shipping_address, true);
            
            // Calculate dynamic weight
            $totalWeight = $order->items->reduce(function ($total, $item) {
                $weightKg = 0;
                if (preg_match('/(300|500|950)/', $item->sku . $item->product_name, $matches)) {
                    $weightKg = (float)$matches[1] / 1000;
                }
                return $total + ($weightKg * $item->quantity);
            }, 0) ?: 1.0;

            // Simple extraction of street number from line1
            $streetNumber = '';
            $street = $address['line1'] ?? '';
            if (preg_match('/^(\d+[a-zA-Z]?)\s+(.+)$/', $street, $matches)) {
                $streetNumber = $matches[1];
                $street = $matches[2];
            }

            $shipmentData = [
                'carrier'             => 'PACE',
                'orientation'         => 'LANDSCAPE',
                'format'              => 'PDF',
                'sender_reference_1'  => (string) $order->id,
                'sender_reference_2'  => $order->customer_name,

                'sender_details' => [
                    'name'         => config('services.nzpost.sender_details.name'),
                    'phone'        => config('services.nzpost.sender_details.phone'),
                    'email'        => config('services.nzpost.sender_details.email'),
                    'company_name' => config('services.nzpost.sender_details.company'),
                ],

                'pickup_address' => config('services.nzpost.pickup_address'),

                'receiver_details' => [
                    'name'  => $order->customer_name,
                    'email' => $order->customer_email,
                    'phone' => $order->customer_phone ?? '',
                ],

                'delivery_address' => [
                    'is_collection'  => false,
                    'street_number'  => $streetNumber ?: ($address['street_number'] ?? ''),
                    'street'         => $street,
                    'suburb'         => $address['line2'] ?? '',
                    'city'           => $address['city'] ?? '',
                    'country_code'   => 'NZ',
                    'postcode'       => $address['postal_code'] ?? '',
                    'instructions'   => $address['instructions'] ?? '',
                ],

                'parcel_details' => [
                    [
                        'service_code'     => 'CPOLE', // confirm correct service code with NZ Post
                        'return_indicator' => 'OUTBOUND',
                        'description'      => 'Honey Order',
                        'dimensions'       => [
                            'weight_kg' => (float) $totalWeight,
                            'length_cm' => 20,
                            'width_cm'  => 15,
                            'height_cm' => 10,
                        ],
                    ]
                ],
            ];

            

            $shipment = $nzPost->createShipment($shipmentData);

            if (empty($shipment['tracking_number'])) {
                throw new \Exception('No tracking number returned from NZ Post.');
            }
            
            $order->update([
                'consignment_id'  => $shipment['consignment_id'] ?? null,
                'tracking_number' => $shipment['tracking_number'] ?? $shipment['consignment_id'] ?? null,
                'label_url'       => $shipment['label_url'] ?? null,
                'shipping_status' => 'shipped',
            ]);

            return redirect()->back()->with('success', 'Shipping label generated and order marked as shipped!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Label generation failed: ' . $e->getMessage());
        }
    }

    /**
     * Fetch real-time tracking from NZ Post
     */
    public function trackOrder(Order $order, \App\Services\NzPostService $nzPost)
    {
        if (!$order->tracking_number) {
            return redirect()->back()->with('error', 'No tracking number associated with this order.');
        }

        try {
            $tracking = $nzPost->getTrackingStatus($order->tracking_number);
            return view('admin.orders.tracking', compact('order', 'tracking'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Tracking fetch failed: ' . $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
