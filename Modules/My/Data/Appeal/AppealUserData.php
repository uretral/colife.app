<?php

namespace Modules\My\Data\Appeal;

use Spatie\LaravelData\Data;

class AppealUserData extends Data
{
    public function __construct(
        public ?int    $id,
        public int     $appeal_id,
        public int     $user_id,
        public ?string $created_at,
    )
    {
    }
}







