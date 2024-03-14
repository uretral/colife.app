<?php

namespace Modules\My\Data\Summary;

use Livewire\Wireable;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;

class ExpenseTypeData extends Data implements Wireable
{
    use WireableData;

    public function __construct(
        public ?int    $id,
        public ?int    $order,
        public ?int    $active,
        public ?string $slug,
        public ?string $color,
        public ?string $locale,
        public ?float  $cost,
        public ?string  $from,
        public ?string  $to,
    )
    {
    }
}
