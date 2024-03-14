<?php

namespace Modules\My\Data\Estate;

use Livewire\Wireable;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;

class EstateUnitData extends Data implements Wireable
{
    use WireableData;
    public function __construct(
        public mixed $id,
        #public ?EstateTenantData $tenant,
        public mixed $tenant,
        public ?string $rent_until,
        public ?int $price,
    )
    {

    }
}
