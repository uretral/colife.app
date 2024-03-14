<?php

namespace Modules\Lk\Data\User;

use Illuminate\Support\Carbon;
use Modules\Lk\Data\Casts\ApiPhoneCast;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class ApiUserAttributesData extends Data
{
    public function __construct(
        public ?int $id,
        public ?int $user_id,

        #[MapInputName('second_name')]
        public ?string $surname,
        public ?string $last_name,

        #[WithCast(ApiPhoneCast::class)]
        public ?string $phone,
        public ?int $phone_verified,
        public ?string $phone_sub,

        #[MapInputName('birth_date')]
        public ?string $bod,
        public ?string $job,
        public ?array $interests,
        public ?int $save_data,
        public ?int $location,
        public ?int $test_user,
        public ?string $telegram,
        public ?string $facebook,
        public ?int $bonus,
        public ?int $cleaning,
        public ?int $master,
        public ?int $email_notification,
        public ?int $sms_notification,
        public ?string $created_at,
        public ?string $updated_at,
        public ?string $deleted_at,
    ) {
        if (!empty($this->bod))
            $this->bod = Carbon::parse($this->bod)->toDateTimeString();
    }
}
