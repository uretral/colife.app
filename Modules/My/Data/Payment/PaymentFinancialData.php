<?php

namespace Modules\My\Data\Payment;

use Livewire\Wireable;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class PaymentFinancialData extends Data implements Wireable
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
        public ?string            $tenant,
        public ?string            $category,
        public ?string            $comment,
        public ?string            $type,
        #[DataCollectionOf(PaymentReceiptData::class)]
        public ?DataCollection    $receipt,
    )
    {
    }
}
