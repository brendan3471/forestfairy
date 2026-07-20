<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WholesaleController extends Controller
{
    /**
     * Display the Wholesale & Bulk Orders page.
     */
    public function index()
    {
        $products = config('products', []);
        return view('wholesale', compact('products'));
    }

    /**
     * Process a wholesale inquiry submission.
     */
    public function submit(Request $request)
    {
        $validated = $request->validate([
            'business_name'   => 'required|string|max:255',
            'contact_name'    => 'required|string|max:255',
            'email'           => 'required|email|max:255',
            'phone'           => 'required|string|max:50',
            'estimated_qty'   => 'required|string',
            'products'        => 'nullable|array',
            'notes'           => 'nullable|string|max:2000',
        ]);

        Log::info('Wholesale inquiry received:', $validated);

        return redirect()->back()->with('wholesale_success', 'Thank you for your bulk inquiry! Our wholesale team will get in touch with you within 24 hours with custom pricing.');
    }
}
