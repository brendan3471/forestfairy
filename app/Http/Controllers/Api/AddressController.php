<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\NzPostService;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function __construct(private NzPostService $nzPost) {}

    /**
     * Search addresses for autocomplete
     */
    public function search(Request $request)
    {
        $request->validate(['q' => 'required|string|min:3']);

        try {
            $addresses = $this->nzPost->searchAddress($request->q);
            return response()->json($addresses);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    /**
     * Get full details for a selected address
     */
    public function details(string $addressId)
    {
        try {
            $address = $this->nzPost->getAddressDetails($addressId);
            return response()->json($address);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}