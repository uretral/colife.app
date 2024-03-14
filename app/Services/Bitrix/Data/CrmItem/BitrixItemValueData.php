<?php

namespace App\Services\Bitrix\Data\CrmItem;

use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;

class BitrixItemValueData extends Data
{
    public function __construct(
        #[Required, StringType]
        public string $bx_name,

        public ?array $value,

    ) {
    }


}
