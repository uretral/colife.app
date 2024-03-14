<?php

namespace Modules\My\Data\User;

use Illuminate\Support\Str;
use Spatie\LaravelData\Data;

class BitrixUserHashData extends Data
{
    public function __construct(
        public ?int $contactId,
        public ?string $email,
        public ?string $name,
        public ?string $shortName,
        public ?string $code,
        public ?string $roleName = 'landlord',
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
