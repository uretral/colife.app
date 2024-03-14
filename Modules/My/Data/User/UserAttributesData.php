<?php

namespace Modules\My\Data\User;

use Spatie\LaravelData\Data;

class UserAttributesData extends Data
{
    public function __construct(
        public ?int $id,
        public ?int $user_id,
        public ?string $phone,
        public ?int $phone_verified,
        public ?string $phone_sub,
        public ?string $surname,
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
    }
}
