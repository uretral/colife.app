<?php

namespace Modules\My\Data\Summary;

use Spatie\LaravelData\Data;

class ApartmentData extends Data
{
    public function __construct(
        public int $apartmentId,
        public ?int $roomsCount,
    )
    {
    }
}
