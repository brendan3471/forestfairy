<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class NzPostService
{
    private string $clientId;
    private string $clientSecret;
    private string $baseUrl;
    private string $authUrl;

    public function __construct()
    {
        $this->clientId = config('services.nzpost.client_id');
        $this->clientSecret = config('services.nzpost.client_secret');
        $this->baseUrl = match(config('services.nzpost.env')) {
            'dev'  => 'https://api.dev.nzpost.co.nz/parcellabel/v3',
            'uat'  => 'https://api.uat.nzpost.co.nz/parcellabel/v3',
            default => 'https://api.nzpost.co.nz/parcellabel/v3',
        };
        $this->authUrl = config('services.nzpost.auth_url', 'https://oauth.nzpost.co.nz/as/token.oauth2');
    }

    /**
     * Get OAuth token, cached for 1 hour
     */
    private function getToken(bool $forceRefresh = false): string
    {
        if ($forceRefresh) Cache::forget('nzpost_token');
        return Cache::remember('nzpost_token', 3500, function () {
            if ($this->clientId === 'your_client_id' || empty($this->clientId)) {
                throw new \Exception('NZ Post API credentials are not configured. Please update NZPOST_CLIENT_ID and NZPOST_CLIENT_SECRET in your .env file.');
            }

            $response = Http::asForm()->post($this->authUrl, [
                'grant_type'    => 'client_credentials',
                'client_id'     => $this->clientId,
                'client_secret' => $this->clientSecret,
            ]);

            if (!$response->successful()) {
                throw new \Exception('NZ Post auth failed: ' . $response->body());
            }

            return $response->json('access_token');
        });
    }

    /**
     * Address autocomplete — returns list of matching addresses
     */
    public function searchAddress(string $query, int $count = 10): array
    {
        $response = Http::withToken($this->getToken())
            ->withHeaders([
                'client_id' => $this->clientId,
            ])
            ->timeout(15)
            ->get("{$this->baseUrl}/parceladdress/2.0/domestic/addresses", [
                'q'       => $query,
                'count'   => $count,
            ]);

        // If 401, refresh token and retry once
        if ($response->status() === 401) {
            $response = Http::withToken($this->getToken(true))
                ->withHeaders([
                    'client_id' => $this->clientId,
                ])
                ->timeout(15)
                ->get("{$this->baseUrl}/parceladdress/2.0/domestic/addresses", [
                    'q'       => $query,
                    'count'   => $count,
                ]);
        }

        if (!$response->successful()) {
            throw new \Exception('NZ Post address search failed: ' . $response->body());
        }

        return $response->json('addresses') ?? [];
    }

    /**
     * Get full address details by address_id
     */
    public function getAddressDetails(string $addressId): array
    {
        $response = Http::withToken($this->getToken())
            ->withHeaders([
                'client_id' => $this->clientId,
            ])
            ->timeout(15)
            ->get("{$this->baseUrl}/parceladdress/2.0/domestic/addresses/{$addressId}");

        // If 401, refresh token and retry once
        if ($response->status() === 401) {
            $response = Http::withToken($this->getToken(true))
                ->withHeaders([
                    'client_id' => $this->clientId,
                ])
                ->timeout(15)
                ->get("{$this->baseUrl}/parceladdress/2.0/domestic/addresses/{$addressId}");
        }

        if (!$response->successful()) {
            throw new \Exception('NZ Post address details failed: ' . $response->body());
        }

        return $response->json('address') ?? [];
    }

    /**
     * Create a shipment and generate a label
     */
    public function createShipment(array $shipmentData): array
    {
        $response = Http::withToken($this->getToken())
            ->withHeaders([
                'client_id' => $this->clientId,
            ])
            ->timeout(15)
            ->post("{$this->baseUrl}/labels", $shipmentData);

        // If 401, refresh token and retry once
        if ($response->status() === 401) {
            $response = Http::withToken($this->getToken(true))
                ->withHeaders([
                    'client_id' => $this->clientId,
                ])
                ->timeout(15)
                ->post("{$this->baseUrl}/labels", $shipmentData);
        }

        if (!$response->successful()) {
            throw new \Exception('NZ Post shipment creation failed: ' . $response->body());
        }

        return $response->json() ?? [];
    }

    public function getLabel(string $consignmentId): array
    {
        $response = $this->makeRequest('get', "{$this->baseUrl}/labels/{$consignmentId}");

        if (!$response->successful()) {
            throw new \Exception('NZ Post get label failed: ' . $response->body());
        }

        return $response->json() ?? [];
    }

    /**
     * Get tracking status for a consignment
     */
    public function getTrackingStatus(string $consignmentId): array
    {
        $response = Http::withToken($this->getToken())
            ->withHeaders([
                'client_id' => $this->clientId,
            ])
            ->timeout(15)
            ->get("{$this->baseUrl}/labels/{$consignmentId}/status");

        // If 401, refresh token and retry once
        if ($response->status() === 401) {
            $response = Http::withToken($this->getToken(true))
                ->withHeaders([
                    'client_id' => $this->clientId,
                ])
                ->timeout(15)
                ->get("{$this->baseUrl}/labels/{$consignmentId}/status");
        }
        
        if (!$response->successful()) {
            throw new \Exception('NZ Post tracking failed: ' . $response->body());
        }

        return $response->json() ?? [];
    }

    /**
     * Get domestic shipping rates
     */
    public function getShippingRates(array $rateData): array
    {
        $response = Http::withToken($this->getToken())
            ->withHeaders([
                'client_id' => $this->clientId,
            ])
            ->timeout(15)
            ->post("{$this->baseUrl}/parcelshipping/2.0/domestic/rates", $rateData);

        // If 401, refresh token and retry once
        if ($response->status() === 401) {
            $response = Http::withToken($this->getToken(true))
                ->withHeaders([
                    'client_id' => $this->clientId,
                ])
                ->timeout(15)
                ->post("{$this->baseUrl}/parcelshipping/2.0/domestic/rates", $rateData);
        }

        if (!$response->successful()) {
            throw new \Exception('NZ Post rates fetch failed: ' . $response->body());
        }

        return $response->json('rates') ?? [];
    }
}