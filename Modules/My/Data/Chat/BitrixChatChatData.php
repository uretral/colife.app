<?php

namespace Modules\My\Data\Chat;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class BitrixChatChatData extends Data
{
    public function __construct(
        #[MapInputName('bx_chat_uid')]
        public ?string $id,

        #[MapInputName('bx_deal_id')]
        public ?int $deal_id,

        public ?string $url,
        public ?string $name = 'My CoLife',

    ) {
        $this->url = config('app.url');
    }
}
