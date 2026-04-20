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
        $this->baseUrl = config('services.nzpost.env') === 'uat'
            ? 'https://api.uat.nzpost.co.nz'
            : 'https://api.nzpost.co.nz';
        $this->authUrl = 'https://oauth.nzpost.co.nz/as/token.oauth2';
    }

    /**
     * Get OAuth token, cached for 1 hour
     */
    private function getToken(): string
    {
        return Cache::remember('nzpost_token', 3500, function () {
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
            ->get("{$this->baseUrl}/parceladdress/2.0/domestic/addresses", [
                'q'       => $query,
                'count'   => $count,
            ]);

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
            ->get("{$this->baseUrl}/parceladdress/2.0/domestic/addresses/{$addressId}");

        if (!$response->successful()) {
            throw new \Exception('NZ Post address details failed: ' . $response->body());
        }

        return $response->json('address') ?? [];
    }
}