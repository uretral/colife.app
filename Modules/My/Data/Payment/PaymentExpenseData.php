<?php

namespace Modules\My\Data\Payment;

use Livewire\Wireable;
use Modules\My\Data\Casts\PaymentTypeCast;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;

class PaymentExpenseData extends Data implements Wireable
{
    use WireableData;
    public function __construct(
        public ?int               $id,
        public ?string            $date,
        public ?string            $period_start,
        public ?string            $period_end,
        public ?PaymentEstateData $apartment,
        public ?PaymentAmountData $amount,
        public ?string            $landlord,
        public ?string            $file,
        public ?string            $comment,
        #[WithCast(PaymentTypeCast::class)]
        public ?string            $payment_type,

    )
    {
    }
}
