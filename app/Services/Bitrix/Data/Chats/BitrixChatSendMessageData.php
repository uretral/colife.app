<?php

namespace App\Services\Bitrix\Data\Chats;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class BitrixChatSendMessageData extends Data
{
    public function __construct(


        public ?string $date,

        #[MapInputName("message.message")]
        public mixed $text,

        public ?int $id,
    ) {
        $this->date = time();
    }


}
