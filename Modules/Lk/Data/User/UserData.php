<?php

namespace Modules\Lk\Data\User;

use Livewire\Wireable;
use Modules\Lk\Data\Casts\UserAvatarCast;
use Modules\Lk\Data\FileData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;

class UserData extends Data implements Wireable
{
    use WireableData;

    public function __construct(
        public int                $id,
        public ?string            $name,
        public ?string            $country_code,
        public ?string            $email,
        public ?string            $google_id,
        public ?int               $bx_id,
        public ?UserAttributeData $attributes,
        public ?string            $created_at,
        public ?string            $deleted_at,
        public ?string            $updated_at,
        public ?FileData          $avatar,
    )
    {
    }
}



