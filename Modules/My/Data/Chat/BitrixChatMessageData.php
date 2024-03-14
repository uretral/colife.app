<?php

namespace Modules\My\Data\Chat;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class BitrixChatMessageData extends Data
{
    public function __construct(
        public ?int $id,
        #[MapInputName('message')]
        public ?string $text,
        #[DataCollectionOf(MessageFileData::class)]
        public ?DataCollection $files,

        public ?string $date,

    ) {
        $this->date = now()->timestamp;
    }
}
