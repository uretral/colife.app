<?php

namespace Modules\My\Data\User;

use Modules\My\Casts\UserRoleCast;
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

class UserData extends Data
{
    public function __construct(

        #[Required, StringType]
        public ?string $name,

        #[Nullable]
        #[MapInputName('contactID')]
        public ?int $bx_id,

        #[Required, Email]
        public ?string $email,

        #[Required, StringType]
        public ?string $password,

        #[MapInputName('code')]
        public ?string $country_code,

        #[MapInputName('roleName')]
        #[WithCast(UserRoleCast::class,'landlord')]
        #[DataCollectionOf(RoleData::class)]
        public DataCollection $roles

    ) {}
}
