<?php

namespace Modules\Lk\Data\Invoice;

use Modules\Lk\Repositories\UserRepository;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class CreateSessionData extends Data
{
    public function __construct(
        public ?string $title,
        public ?string $code,
        #[MapInputName('tenant')]
        public ?int $contactId,
        #[MapInputName('id')]
        public ?int $paymentId,
        public ?float $amount,
        public ?string $currency,
    ) {
        $this->code = UserRepository::getAuthUserCountryCode();
        $this->amount = $this->amount * 100;
    }
}

