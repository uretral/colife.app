<?php

namespace Modules\My\Data\Payment;

use Spatie\LaravelData\Data;

class PaymentReceiptData extends Data
{
    public function __construct(
        public ?string $filename,
        public ?string $url,
    )
    {
    }
}
