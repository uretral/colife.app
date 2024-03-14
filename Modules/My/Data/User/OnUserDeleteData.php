<?php

namespace Modules\My\Data\User;

use Modules\My\Casts\UserDeleteReasonCast;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class OnUserDeleteData extends Data
{
    public function __construct(
        public ?int $id,
        #[MapInputName("reasonId")]
        #[WithCast(UserDeleteReasonCast::class)]
        public ?string $reason,
        public ?string $reasonText,
        public ?string $delete_reason,
        public ?string $deleted_at,
    ) {
        $this->deleted_at = now();
        $this->delete_reason = $this->reason;

        if (!empty($this->reasonText)) {
            $this->delete_reason .= ": " . $reasonText;
        }
    }
}



