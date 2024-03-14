<?php

namespace Modules\Lk\Data\Payment;

use Modules\Lk\Data\ContentData;
use Spatie\LaravelData\Data;

class PaymentPurposeData extends Data
{
    public function __construct(
        public ?int         $id,
        public ?int         $order,
        public ?int         $active,
        public ?string      $title,
        public ?ContentData $content,
        public ?string      $color,
        public ?string      $bg,
        public ?string      $icon_filter,
        public ?bool        $is_hidden,
        public ?string      $type,
        public ?string      $created_at,
        public ?string      $updated_at,
    )
    {
    }
}








