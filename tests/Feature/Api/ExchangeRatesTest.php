<?php

declare(strict_types=1);

namespace Tests\Feature\Api;

use App\Dto\LatestExchangeRatesDto;
use App\Services\ExchangeRatesService;
use Tests\TestCase;
use Throwable;
use Exception;

class ExchangeRatesTest extends TestCase
{
    private ExchangeRatesService $service;
    protected function setUp(): void
    {
        parent::setUp();

        $this->service = app(ExchangeRatesService::class);
    }
    public function testGetExchangeRatesSuccessResponse(): void
    {
        try {
            $dto = $this->service->getLatestExchangeRates();
            $this->assertInstanceOf(LatestExchangeRatesDto::class, $dto);
        } catch (Throwable $e) {
            $this->assertInstanceOf(Exception::class, $e);
            $this->assertEquals('Could not fetch exchange rates', $e->getMessage());
        }
    }
}
