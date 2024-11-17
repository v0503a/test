<?php

declare(strict_types=1);

namespace App\Dto;

use DateTimeImmutable;

final class LatestExchangeRatesDto
{
    public function __construct(
        readonly public ?string $disclaimer,
        readonly public ?string $license,
        readonly public DateTimeImmutable|false $timestamp,
        readonly public ?string $base,
        readonly public ?array $rates,
    ) {
    }
}
