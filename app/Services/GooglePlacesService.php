<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GooglePlacesService
{
    private ?string $apiKey;

    public function __construct()
    {
        $this->apiKey = config('services.google.places_api_key');
    }

    /**
     * Address autocomplete — returns list of matching addresses from Google Places
     */
    public function searchAddress(string $query): array
    {
        if (empty($this->apiKey)) {
            throw new \Exception('Google Places API key is not configured. Please update GOOGLE_PLACES_API_KEY in your .env file.');
        }

        $response = Http::timeout(15)
            ->get('https://maps.googleapis.com/maps/api/place/autocomplete/json', [
                'input'      => $query,
                'key'        => $this->apiKey,
                'components' => 'country:nz', // Restrict autocomplete results to New Zealand
            ]);

        if (!$response->successful()) {
            throw new \Exception('Google Places Autocomplete failed: ' . $response->body());
        }

        $data = $response->json();

        if (isset($data['status']) && !in_array($data['status'], ['OK', 'ZERO_RESULTS'])) {
            throw new \Exception('Google Places Autocomplete API error: ' . $data['status'] . ' - ' . ($data['error_message'] ?? ''));
        }

        return collect($data['predictions'] ?? [])->map(function ($prediction) {
            return [
                'full_address' => $prediction['description'] ?? '',
                'address_id'   => $prediction['place_id'] ?? '',
            ];
        })->all();
    }

    /**
     * Get address details by place_id and determine if it is a rural address
     */
    public function getAddressDetails(string $placeId): array
    {
        if (empty($this->apiKey)) {
            throw new \Exception('Google Places API key is not configured. Please update GOOGLE_PLACES_API_KEY in your .env file.');
        }

        $response = Http::timeout(15)
            ->get('https://maps.googleapis.com/maps/api/place/details/json', [
                'place_id' => $placeId,
                'key'      => $this->apiKey,
                'fields'   => 'address_components,formatted_address',
            ]);

        if (!$response->successful()) {
            throw new \Exception('Google Places Details failed: ' . $response->body());
        }

        $data = $response->json();

        if (isset($data['status']) && $data['status'] !== 'OK') {
            throw new \Exception('Google Places Details API error: ' . $data['status'] . ' - ' . ($data['error_message'] ?? ''));
        }

        $result = $data['result'] ?? [];
        $formattedAddress = $result['formatted_address'] ?? '';

        // Detect rural addresses (RD) for New Zealand (e.g. "RD 1", "RD 2", "RD1", etc.)
        $isRural = (bool) preg_match('/\bRD\s*\d+/i', $formattedAddress);

        return [
            'formatted_address' => $formattedAddress,
            'is_rural'          => $isRural,
        ];
    }
}
