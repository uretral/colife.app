<?php

namespace Modules\My\Data\Request;

use Spatie\LaravelData\Data;

class RequestUserData extends Data
{
    public function __construct(
        public ?int    $id,
        public int     $request_id,
        public int     $user_id,
        public ?string $created_at,
    )
    {
    }
}







