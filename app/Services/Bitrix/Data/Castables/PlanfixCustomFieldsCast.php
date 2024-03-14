<?php


namespace App\Services\Bitrix\Data\Castables;


use App\Services\Bitrix\Helpers\BitrixHelper;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class PlanfixCustomFieldsCast implements Cast
{

    private string $customField;

    /**
     * @throws \Exception
     */
    public function cast(DataProperty $property, mixed $value, array $context): null|string
    {
        // Установка ID поля для поиска в данных
        self::getAttributeId($property);

        try {
            if (is_array($value)) {
                // Формируем рукурсивно коллекцию
                $collection = BitrixHelper::r_collect($value);
                $data = $collection->filter(
                    function ($item) {
                        if ($item->contains('name', $this->customField)) {
                            return $item;
                        }
                    }
                )->first();

                return $data['stringValue'] ?? null;
            }

            return null;
        } catch (\Exception $e) {
            return null;
        }
    }

    private function getAttributeId(DataProperty $property): void
    {
        $this->customField = $property->attributes->filter(
                fn(object $attribute) => $attribute instanceof WithCast
            )->first()->arguments[0] ?? 1;
    }
}
