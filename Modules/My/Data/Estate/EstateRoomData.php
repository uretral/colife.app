<?php

namespace Modules\My\Data\Estate;

use Livewire\Wireable;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class EstateRoomData extends Data implements Wireable
{
    use WireableData;

    public function __construct(
        public mixed $id,
        #[DataCollectionOf(EstateUnitData::class)]
        public ?DataCollection $units,
        public ?int $state,
        public ?int $busyUnits,
        public ?int $emptyUnits,
        public ?int $busyness
    )
    {
    }
}
