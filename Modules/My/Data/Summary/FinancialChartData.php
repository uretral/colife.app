<?php

namespace Modules\My\Data\Summary;

use Spatie\LaravelData\Data;

class FinancialChartData extends Data
{
    public function __construct(
        public ?string $period,
        public ?int    $receive,
        public ?int    $expense,
    )
    {
    }
}
