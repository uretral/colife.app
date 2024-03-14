<?php

namespace Modules\Lk\Data\Chat;

use Modules\Lk\Entities\User;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class ChatUserData extends Data
{
    public function __construct(
        public int $id,
        public ?int $bx_id,
        public ?string $role,
        public ?string $name,
        #[MapInputName('attributes.phone')]
        public ?string $phone,
        #[MapInputName('chatAttributes.initials')]
        public ?string $initials,
        #[MapInputName('chatAttributes.img')]
        public ?string $img,
        #[MapInputName('chatAttributes.color')]
        public ?string $color,
        #[MapInputName('chatAttributes.bg')]
        public ?string $bg,

    ) {
        $this->role = User::find($this->id)->roles()->first()?->name;
    }
}
