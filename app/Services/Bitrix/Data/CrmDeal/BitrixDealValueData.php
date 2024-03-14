<?php


namespace App\Services\Bitrix\Data\CrmDeal;


use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;

class BitrixDealValueData
{
    public function __construct(
        #[Required, StringType]
        public string $bx_name,

        public ?array $value,

    ) {
    }
}
