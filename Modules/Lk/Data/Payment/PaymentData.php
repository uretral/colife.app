<?php

namespace Modules\Lk\Data\Payment;

use Spatie\LaravelData\Data;

class PaymentData extends Data
{
    public function __construct(
        public ?int               $id,
        public ?string            $tenant,
        public ?string            $payed_at,
        public ?PaymentAmountData $amount,
        public mixed              $plan,
        public ?string            $refund,
        public ?string            $comment,
        public ?string            $description,
        public ?string            $type,

//        public ?PaymentPurposeData $purpose,
//        public ?PaymentStatusData  $status,
//
//        public mixed               $currency,
//        public ?string             $description,
//        public ?string             $deadline,
//        public ?string             $created_at,
//        public ?string             $updated_at,
    )
    {
    }
}


//"id":5514,"payed_at":null,"tenant":"29206","amount":null,"plan":null,"refund":null,"comment":"нет аналитики","type":null
