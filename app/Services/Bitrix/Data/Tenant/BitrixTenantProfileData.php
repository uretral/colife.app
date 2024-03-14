<?php

namespace App\Services\Bitrix\Data\Tenant;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class BitrixTenantProfileData extends Data
{
    public function __construct(

        public ?int $bx_id,
        public ?string $name,
        public ?string $email,

        #[MapInputName('country_code')]
        public ?string $code,

        #[MapInputName('deleted_at')]
        public ?bool $isDeleted,
        public ?string $delete_reason,

        #[MapInputName('attributes')]
        public ?BitrixLkAttributesData $attributes,
    ) {
    }

}
