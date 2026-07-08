<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\GooglePlacesService;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    public function __construct(private GooglePlacesService $googlePlaces) {}

    /**
     * Search addresses for autocomplete
     */
    public function search(Request $request)
    {
        $request->validate(['q' => 'required|string|min:3']);

        try {
            $addresses = $this->googlePlaces->searchAddress($request->q);
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
            $address = $this->googlePlaces->getAddressDetails($addressId);
            return response()->json($address);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}