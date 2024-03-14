<?php

namespace App\Services\Bitrix\Data\Tenant;

use Spatie\LaravelData\Data;

class BitrixTenantPositionData extends Data
{
    public function __construct(
        public ?string $position_id,
    ) {
    }

}
