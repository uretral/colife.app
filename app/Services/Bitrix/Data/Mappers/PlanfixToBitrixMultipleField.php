<?php

namespace App\Services\Bitrix\Data\Mappers;


use App\Services\Bitrix\Data\Castables\PlanfixPhoneTypeIdCast;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;


class PlanfixToBitrixMultipleField extends Data
{
    public function __construct(

        #[MapInputName('ID')]
        #[MapOutputName('ID')]
        public null|int|Optional $bx_id,

        #[Nullable]
        #[MapInputName('maskedNumber')]
        #[MapOutputName('VALUE')]
        public null|string|Optional $value,

        #[Nullable]
        public null|int|Optional $contact_id,

        #[Nullable]
        #[MapInputName('type')]
        #[MapOutputName('VALUE_TYPE')]
        #[WithCast(PlanfixPhoneTypeIdCast::class)]
        public null|string|Optional $value_type,
    ) {
    }



}
