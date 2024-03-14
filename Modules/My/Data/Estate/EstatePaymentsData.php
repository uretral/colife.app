<?php

namespace Modules\My\Data\Estate;

use Livewire\Wireable;
use Modules\My\Data\Payment\PaymentAmountData;
use Modules\My\Data\Payment\PaymentEstateData;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;

class EstatePaymentsData extends Data implements Wireable
{
    use WireableData;

    public function __construct(
        public int|string $id,
        public ?string    $date,
        public ?string    $hint,
        public ?PaymentAmountData       $amount,
        public ?PaymentEstateData       $apartment,
// TODO: Перенесены в PaymentEstateData
//        public mixed      $estate_id,
//        public ?string    $estate_address,
        public ?string    $document,
        public ?string    $payment_type,
        public ?string    $payment_purpose,
        public ?string    $comment,
    )
    {
    }
}
