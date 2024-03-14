<?php

namespace App\Services\Bitrix\Data\Planfix;

use App\Services\Bitrix\Data\Castables\PlanfixApartmentFieldTypeCast;
use App\Services\Bitrix\Models\BitrixCrmTypeFields;
use Illuminate\Support\Str;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class ExtractUnitData extends Data
{
    public function __construct(

        #[MapInputName('bx_field')]
        public string $bx_name,

        #[MapInputName('getField')]
        public null|string $getField,

        #[MapInputName('type')]
        public null|string $type,

        #[MapInputName('field_name')]
        public ?string $field,

        public ?int $crm_type_field_id,

        public mixed $value,

        #[MapInputName('fieldType')]
        public string $fieldType = "field",
    ) {

        $this->crm_type_field_id = BitrixCrmTypeFields::whereBxEntityTypeId(171)
            ->whereBxName($this->bx_name)->first()?->id;
        $this->value= self::getValue($this->value);
    }

    protected function rawValue($value)
    {
        // Если сложное значение
        if (Str::contains($this->getField,".")) {
            $array_value = explode(".", $this->getField);
            $value = array_column($value, end($array_value));
            return implode("", $value);
        } else {

            return !empty($value[$this->getField])
                ? $value[$this->getField]
                : $value;
        }
    }

    protected function getValue($value)
    {
        try {
            if (!$this->getField) {
                return $value;
            }

            if (!$this->type) {
                return $value[$this->getField];
            }

            //Приведение к значениям Битрикс по типу
            return PlanfixApartmentFieldTypeCast::handle($this->type,$this->rawValue($value));

        } catch (\Exception $e) {
            dd($this->value, $this->bx_name, $this->toArray(), $e->getMessage());
            throw new \Exception($e->getMessage());
        }
    }


}
