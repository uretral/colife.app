<?php

namespace Modules\Lk\Data\Payment;

use Spatie\LaravelData\Data;

class PaymentStatusData extends Data
{
    public function __construct(
        public ?int    $id,
        public ?int    $order,
        public ?int    $active,
        public ?string $title,
        public ?string $created_at,
        public ?string $updated_at,
    ) {}
}
