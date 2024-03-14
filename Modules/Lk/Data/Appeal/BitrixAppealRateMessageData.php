<?php

namespace Modules\Lk\Data\Appeal;

use Spatie\LaravelData\Data;

class BitrixAppealRateMessageData extends Data
{
    public function __construct(
        public ?int $id,
        public ?string $text,
        public ?string $date,
        public ?string $disable_crm = "Y",
    ) {
        $this->date = now()->timestamp;
    }
}







