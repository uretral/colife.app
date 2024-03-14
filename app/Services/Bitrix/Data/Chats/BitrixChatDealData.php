<?php

namespace App\Services\Bitrix\Data\Chats;

use App\Data\Casts\AppealContactCast;

use App\Services\Bitrix\Data\CrmContact\BitrixCrmContactData;
use Spatie\LaravelData\Attributes\MapInputName;

use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class BitrixChatDealData extends Data
{
    public function __construct(

        public ?string $title,

        #[MapInputName('chat.bx_chat_uid')]
        public ?string $chat,

        #[MapInputName('user.ID')]
        public ?int $contact_id,

        public ?string $priority,
        public ?int $unit_id,

        #[MapInputName('message.message')]
        public ?string $message,
        public ?array $files,

        public ?int $category_id,
        public ?string $stage_id = "new",
        public int $opportunity = 0,

    ) {
    }


}
