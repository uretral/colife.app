<?php

namespace Modules\My\Data\Casts;

use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class PaymentTypeCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): string
    {
        return match ($value) {
            'Элект-во и вода (DEWA)' => 'dewa',
            'Газ (Gas)' => 'gas',
            'Смета (Quotation)' => 'quotation',
            'Интернет (Internet)' => 'internet',
            'Техобслуживание (Maintenance)' => 'maintenance',
            'Comission of Colife' => 'commission_of_colife',
            default => 'any',
        };

    }
}
