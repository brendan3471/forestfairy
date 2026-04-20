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
            
            // Simplified shipment data — would need real weight/dims from products
            $shipmentData = [
                'recipient' => [
                    'name'         => $order->customer_name,
                    'email'        => $order->customer_email,
                    'address_id'   => $order->address_id ?? null, // if we stored it
                    'street'       => $address['line1'] ?? '',
                    'suburb'       => $address['line2'] ?? '',
                    'city'         => $address['city'] ?? '',
                    'postcode'     => $address['postal_code'] ?? '',
                ],
                'sender' => config('services.nzpost.sender_details'), // Need to configure this
                'parcel' => [
                    'weight' => 1.0, // placeholder
                ],
            ];

            $shipment = $nzPost->createShipment($shipmentData);
            
            $order->update([
                'tracking_number' => $shipment['tracking_number'] ?? null,
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
