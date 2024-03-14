<?php

namespace Modules\My\Data\Chat;

use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class BitrixChatConactData extends Data
{
    public function __construct(

        #[MapInputName('bx_id')]
        #[MapOutputName('ID')]
        public ?int $id,
        #[MapOutputName('NAME')]
        public ?string $name,
        #[MapInputName('attributes.phone')]
        #[MapOutputName('PHONE')]
        public ?string $phone,
        #[MapOutputName('EMAIL')]
        public ?string $email,

        public ?string $skip_phone_validate = 'Y',

    ) {
        $this->url = config('bitrix24.MY_ACCOUNT_URL');
    }
}
