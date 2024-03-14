<?php


namespace App\Services\Bitrix\Data\Castables;


use Illuminate\Support\Carbon;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class DealStageCast implements Cast
{

    public string $defaultStage = 'PREPAYMENT_INVOIC';
    public int $category = 38;

    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {

        self::getAttributeId($property);
        return "C{$this->category}:{$this->defaultStage}";
    }

    private function getAttributeId(DataProperty $property): void
    {
        $this->category = $property->attributes->filter(
                fn(object $attribute) => $attribute instanceof WithCast
            )->first()->arguments[0] ?? 38;
    }
}
