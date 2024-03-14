<?php

namespace App\Services\Bitrix\Data\My;

use Spatie\LaravelData\Data;

class BitrixMyAttributesData extends Data
{
    public function __construct(
        public ?string $phone,
        public ?string $last_name,
        public ?bool $cleaning,
        public ?bool $master,
        public ?bool $email_notification,
        public ?bool $sms_notification,
    ) {
    }

}
