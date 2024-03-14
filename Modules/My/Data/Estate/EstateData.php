<?php

namespace Modules\My\Data\Estate;

use Livewire\Wireable;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class EstateData extends Data implements Wireable
{
    use WireableData;

    public function __construct(
        public int|string $id,
        public ?string $city,
        public ?string $title,
        public ?string $contract,
        public ?string $address,
        public ?int $square,
        public ?array $photos,
        #[DataCollectionOf(EstateRoomData::class)]
        public ?DataCollection $rooms,
        public ?int $state,
        public ?int $roomsBusy,
        public ?int $roomsEmpty,
        public ?int $roomsPartly,
        public ?int $busyness
    )
    {
    }
}
