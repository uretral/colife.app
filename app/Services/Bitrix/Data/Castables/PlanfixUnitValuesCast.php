<?php


namespace App\Services\Bitrix\Data\Castables;


use App\Services\Bitrix\Data\Mappers\PlanfixToBitrixItemValuesData;
use App\Services\Bitrix\Data\Planfix\CastApartmentData;
use App\Services\Bitrix\Data\Planfix\ExtractApartmentData;
use App\Services\Bitrix\Data\Planfix\ExtractUnitData;
use App\Services\Bitrix\Enum\UnitSettingsEnum;
use App\Services\Planfix\Models\DirectoryEntry;
use Illuminate\Support\Collection;
use Spatie\Enum\Laravel\Enum;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class PlanfixUnitValuesCast implements Cast
{
    private Collection $data;

    /**
     * @throws \Exception
     */
    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {
        try {
            $this->data = collect([]);

            foreach ($context as $name => $value) {
                if (!empty(UnitSettingsEnum::FIELDS()[$name]['name']))
                    $this->data->push(self::getField($name, $value));

                if ($name == "customFieldData")
                    self::getCustomField($value);
            }

            return PlanfixToBitrixItemValuesData::collection($this->data);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    protected function getField($name, $value, $settings = 'FIELDS'): ExtractUnitData
    {
        $const = UnitSettingsEnum::$settings();

        return ExtractUnitData::from(
            [
                "bx_field"   => $const[$name]['name'],
                "getField"   => $const[$name]['getField'] ?? null,
                "type"       => $const[$name]['type'] ?? null,
                "field_name" => $name,
                "value"      => $value,
                "fieldType"  => $settings != 'FIELDS'
                    ? "customField"
                    : "field"
            ]
        );
    }

    protected function getCustomField($value)
    {
        foreach ($value as $cName => $cValue) {
            $fieldName = $cValue['field']['name'];
            if (!empty(UnitSettingsEnum::CUSTOM_FIELDS()[$fieldName])) {
                if ($fieldName != 'Объект (квартира)') {
                    $this->data->push(self::getField($fieldName, $cValue, "CUSTOM_FIELDS"));
                } else {
//                    $apartmentDto = CastApartmentData::from($cValue);
//                    $entries = DirectoryEntry::where($apartmentDto->toArray())->get();

//                    foreach (UnitSettingsEnum::FLAT_FIELDS() as $name => $flat) {
//                        if ($exist = $entries->where("field.name", $name)->first()) {
//                            $this->data->push(self::getField($name, $exist->toarray(), "FLAT_FIELDS"));
//                        }
//                    }
                }
            }
        }
    }


}
