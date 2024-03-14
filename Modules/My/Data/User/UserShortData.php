<?php

namespace Modules\My\Data\User;

use Livewire\Wireable;
use Modules\My\Data\FileData;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;

class UserShortData extends Data implements Wireable
{
    use WireableData;

    public function __construct(
        public int|string          $id,
        public ?string             $name,
        public ?string             $email,
        public ?FileData           $avatar,
        public ?string             $google_id,
        public ?int                $bx_id,
        public ?UserAttributesData $attributes,
        public ?UserContactData    $contact,
        public ?string             $created_at,
        public ?string             $deleted_at,
        public ?string             $updated_at,
    )
    {
    }
}
