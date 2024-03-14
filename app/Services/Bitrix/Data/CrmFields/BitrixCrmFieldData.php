<?php

namespace App\Services\Bitrix\Data\CrmFields;


use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;


class BitrixCrmFieldData extends Data
{
    public function __construct(


        public ?string $bx_name,
        public ?string $model,
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
