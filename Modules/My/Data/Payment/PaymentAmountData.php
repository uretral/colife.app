<?php

namespace Modules\My\Data\Payment;

use Spatie\LaravelData\Data;

class PaymentAmountData extends Data
{
    public function __construct(
        public ?string $value,
        public ?string $currency,
    ) {}
}
