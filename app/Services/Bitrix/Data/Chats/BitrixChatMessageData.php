<?php

namespace App\Services\Bitrix\Data\Chats;

use Illuminate\Support\Facades\Log;
use Modules\Tenant\Data\Appeal\AppealMessageFileData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class BitrixChatMessageData extends Data
{
    public function __construct(

        public ?string $date,
        public ?int $user_id,
        public ?array $attachments,
        public ?array $params,
        #[MapInputName("message")]
        public ?string $text,
        #[DataCollectionOf(AppealMessageFileData::class)]
        public ?DataCollection $files,

        public ?int $id,
    ) {
        $this->date = time();

        if (!empty($this->user_id))
            $this->user_id = null;

        Log::channel('bitrix')->info(json_encode($this->files));
    }


}
