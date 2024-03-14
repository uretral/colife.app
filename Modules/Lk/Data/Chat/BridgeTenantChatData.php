<?php

namespace Modules\Lk\Data\Chat;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class BridgeTenantChatData extends Data
{
    public function __construct(
        public mixed $bx_chat_uid,
        public mixed $bx_chat_id,
        public mixed $bx_user_id,
        public mixed $bx_chat_user_id,
    ) {
    }
}
