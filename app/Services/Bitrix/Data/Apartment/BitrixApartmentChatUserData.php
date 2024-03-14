<?php

namespace App\Services\Bitrix\Data\Apartment;

use Spatie\LaravelData\Data;

class BitrixApartmentChatUserData extends Data
{
    public function __construct(
        public ?int $id,
        public ?int $bx_apartment_id,
        public ?int $bx_user_id,
        public ?\DateTime $created_at,
        public ?\DateTime $updated_at,
        public ?\DateTime $deleted_at,
    ) {
    }

}
