<?php

namespace App\Services\Bitrix\Data\SiteUser;

use Illuminate\Support\Str;
use Spatie\LaravelData\Data;

class FollowByBitrixLinkData extends Data
{
    public function __construct(
        public ?int $contactId,
        public ?string $email,
        public ?string $name,
        public ?string $shortName,
        public ?string $code,
        public ?string $roleName = 'tenant',
    ) {
        $this->shortName = $this->getShortName();
    }

    function getShortName()
    {
        if (!empty($this->name)) {
            return Str::of($this->name)->explode(" ")->first();
        }
        return '';
    }
}
