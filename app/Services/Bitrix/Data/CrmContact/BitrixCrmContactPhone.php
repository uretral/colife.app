<?php

namespace App\Services\Bitrix\Data\CrmContact;


use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;


class BitrixCrmContactPhone extends Data
{
    public function __construct(
        #[MapInputName('ID')]
        #[MapOutputName('ID')]
        public null|int|Optional $bx_id,

        #[Nullable]
        #[MapInputName('VALUE')]
        #[MapOutputName('VALUE')]
        public null|string|Optional $value,

        #[Nullable]
        public null|int|Optional $contact_id,

        #[Nullable]
        #[MapInputName('VALUE_TYPE')]
        #[MapOutputName('VALUE_TYPE')]
        public null|string|Optional $value_type,
    ) {
    }



}
