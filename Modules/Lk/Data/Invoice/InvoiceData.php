<?php

namespace Modules\Lk\Data\Invoice;

use Spatie\LaravelData\Data;

class InvoiceData extends Data
{
    public function __construct(
        public ?int $id,
        public ?string $title,
        public ?string $tenant,
        public ?float $amount,
        public ?string $currency,
        public ?string $comment,
        public ?string $description,
        public ?string $type,
        public ?string $begin_at,
        public ?string $deadline,
    ) {
    }
}

