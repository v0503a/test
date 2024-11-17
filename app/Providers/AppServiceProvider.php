<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\Api\ExchangeRatesClient;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(ExchangeRatesClient::class,
            fn (): ExchangeRatesClient => new ExchangeRatesClient(
                new Client([
                    'base_uri' => config('services.exchange_rates.url'),
                    'header' => ['accept' => 'application/json'],
                ])
            )
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
