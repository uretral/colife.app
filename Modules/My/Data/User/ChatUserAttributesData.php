<?php

namespace Modules\My\Data\User;

use App\Helpers\Helper;
use Modules\My\Casts\UserRoleCast;
use Illuminate\Support\Str;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\Validation\Email;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;

class ChatUserAttributesData extends Data
{
    public function __construct(
        public ?int $id,
        public ?int $user_id,
        public ?string $name,
        public ?string $last_name,
        public ?string $initials,
        public ?string $created_at,
        public ?string $updated_at,
        public ?string $deleted_at,

        public ?string $color,
        public ?string $bg,
        public ?string $img = 'resources/img/icons/user-2.png',

    ) {
        $this->setInitials();
        $this->setColor();
        $this->setBg();
        $this->setCreatedAt();
    }

    public function setInitials(){
        if (!empty($this->name))
           $this->initials = Str::limit($this->name, 1,'');

        if (!empty($this->last_name))
            $this->initials .= Str::limit($this->last_name, 1,'');
    }

    public function setColor(){
        if (empty($this->color))
            $this->color = Helper::randomColor();
    }

    public function setBg(){
        if (empty($this->bg))
            $this->bg = Helper::randomColor();
    }

    public function setCreatedAt(){
        if (empty($this->created_at))
            $this->created_at = now();
    }
}
