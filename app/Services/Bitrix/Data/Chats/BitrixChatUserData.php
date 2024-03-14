<?php

namespace App\Services\Bitrix\Data\Chats;

use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Data;

class BitrixChatUserData extends Data
{
    public function __construct(
        #[Nullable]
        #[MapInputName("ID")]
        public ?int $id,

        #[MapInputName("NAME")]
        public ?string $name,

        #[MapInputName("LAST_NAME")]
        public ?string $last_name,

        #[MapInputName("PHONE")]
        public mixed $phone,
    ) {
        $this->setPhone();
    }

    protected function setPhone(){

        if (!empty($this->phone)) {
            if (!empty($this->phone[0]['VALUE'])) {
                $this->phone = $this->phone[0]['VALUE'];
            }
            elseif (is_string($this->phone) && mb_strlen($this->phone) > 16) {
                $this->phone = self::getPhone(json_decode($this->phone,1));
            }
            elseif (is_string($this->phone) && mb_strlen($this->phone) < 16) {
                $this->phone = $this->phone;
            }
            else {
                $this->phone = null;
            }
        }
    }

    protected function getPhone($phones){
        if (!empty($phones)) {
            if (!empty($phones[0]['VALUE']))
                return $phones[0]['VALUE'];
            if (!empty($phones[0]['value']))
                return $phones[0]['value'];
        }
    }

}
