<?php

namespace App\Services\Bitrix\Data\Tenant;

use App\Services\Bitrix\Data\Castables\LkInterestsCast;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class BitrixLkAttributesData extends Data
{
    public function __construct(
        public ?string $phone,
        public ?string $last_name,
        public ?string $about,
        public ?string $bod,
        public ?string $job,
        #[WithCast(LkInterestsCast::class)]
        public ?string $interests,
        public ?string $telegram,
        public ?string $instagram,
        public ?string $facebook,
        public ?string $vkontakte,
        public ?string $bonus,
        public ?bool $cleaning,
        public ?bool $master,
        public ?bool $email_notification,
        public ?bool $sms_notification,
        #[MapInputName('position.title')]
        public ?string $position,
    ) {
    }

}
