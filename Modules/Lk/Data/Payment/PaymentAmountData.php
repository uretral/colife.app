<?php

namespace Modules\Lk\Data\Payment;

use Spatie\LaravelData\Data;

class PaymentAmountData extends Data
{
    public function __construct(
        public ?string $value,
        public ?string $currency,
    ) {}
}
