<?php

namespace Modules\My\Data\Payment;

use Spatie\LaravelData\Data;

class PaymentEstateData extends Data
{
    public function __construct(
        public ?string $estate_id,
        public ?string $estate_address,
    ) {}
}
