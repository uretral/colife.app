<?php

namespace Modules\Lk\Data\Chat;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class BitrixChatChatData extends Data
{
    public function __construct(
        #[MapInputName('bx_chat_uid')]
        public ?string $id,
        public ?string $url,
        public ?string $name = 'CoLife Chat',

    ) {
        $this->url = config('bitrix24.ACCOUNT_URL');
    }
}
