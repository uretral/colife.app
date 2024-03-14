<?php

namespace Modules\Lk\Data\User;

use Spatie\LaravelData\Data;

class UserNotificationCountsData extends Data
{
    public function __construct(

        public ?int $user_id,
        public ?int $chats,
        public ?int $appeals,
    ) {
    }
}



