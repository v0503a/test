<?php

declare(strict_types=1);

namespace App\Services;

use App\Dto\LatestExchangeRatesDto;
use App\Services\Api\ExchangeRatesClient;
use Exception;
use DateTimeImmutable;

class ExchangeRatesService
{
    public function __construct(
        private readonly ExchangeRatesClient $exchangeRatesClient,
    ) {
    }

    /**
     * @throws Exception
     */
    public function getLatestExchangeRates(): LatestExchangeRatesDto
    {
        $response = $this->exchangeRatesClient->getLatestExchangeRates();

        if (!$response) {
            throw new Exception('Could not fetch exchange rates');
        }

        return new LatestExchangeRatesDto(
            disclaimer: data_get($response, 'disclaimer'),
            license: data_get($response, 'license'),
            timestamp: DateTimeImmutable::createFromFormat('U', (string) data_get($response,'timestamp')),
            base: data_get($response,'base'),
            rates: data_get($response, 'rates'),
        );
    }
}
