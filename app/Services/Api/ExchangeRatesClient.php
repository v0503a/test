<?php

declare(strict_types=1);

namespace App\Services\Api;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Support\Facades\Log;

class ExchangeRatesClient
{
    public function __construct(
        private readonly ClientInterface $client,
    ) {
    }

    public function getLatestExchangeRates(): ?array
    {
        try {
            $response = $this->client->request(Request::METHOD_GET, config('services.exchange_rates.api_latest'), [
                'query' => [
                    'app_id' => config('services.exchange_rates.internal_token'),
                ],
            ]);
        } catch (GuzzleException $e) {
            Log::error($e);
            return null;
        }

        return json_decode($response->getBody()->getContents(), true);
    }
}
