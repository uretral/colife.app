<?php

namespace App\Services\Bitrix\Data\Chats;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;

class BitrixChatData extends Data
{
    public function __construct(

        #[MapInputName("bx_chat_uid")]
        public ?string $id,
        public ?string $url,

    ) {
        $this->url = config('app.url');
    }


}
