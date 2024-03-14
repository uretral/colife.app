<?php

namespace App\Services\Bitrix\Data\CrmContact;


use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;


class BitrixCrmContactFieldData extends Data
{
    public function __construct(

        #[MapInputName('title')]
        public string $bx_name,

        #[MapInputName('listLabel')]
        public null|string|Optional $title,

        #[MapInputName('formLabel')]
        public ?string $label,

        public string $type,
        public ?bool $isRequired,
        public ?bool $isMultiple,
        public ?bool $isDynamic,
        public ?array $settings,
    ) {
    }



}
