<?php

namespace Modules\My\Data\Appeal;

use Illuminate\Support\Str;
use Spatie\LaravelData\Data;

class AppealBitrixData extends Data
{
    public function __construct(
        public ?int                 $id,
        public ?int                 $appeal_id,
        public ?string              $bx_chat_uid,
        public ?int                 $bx_user_id,
        public ?int                 $bx_deal_id,
        public ?string              $created_at,
    )
    {
        if (empty($this->id) & !empty($this->appeal_id))
            $this->bx_chat_uid = "chat" . (string )Str::ulid();
    }
}



