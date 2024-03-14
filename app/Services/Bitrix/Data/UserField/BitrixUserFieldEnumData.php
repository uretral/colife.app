<?php


namespace App\Services\Bitrix\Data\UserField;


use Illuminate\Support\Optional;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;

class BitrixUserFieldEnumData extends Data
{
    public function __construct(

        #[MapInputName('id')]
        #[MapOutputName('id')]
        public ?int $bx_id,
        public string $value,
        public int $userFieldId,
        public null|string $def,
        public null|int $sort = 0,
    )
    {
        if (empty($this->def))
            $this->def = "N";
    }

}
