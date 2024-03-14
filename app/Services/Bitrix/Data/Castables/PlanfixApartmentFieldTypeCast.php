<?php


namespace App\Services\Bitrix\Data\Castables;


use App\Services\Bitrix\Helpers\BitrixHelper;
use App\Services\Bitrix\Models\BitrixUserField;
use App\Services\Planfix\Models\Contact;
use App\Services\Planfix\Models\Task;
use Carbon\Carbon;

/**
 * Приведение к значениям Битрикс из значений DTO Планфикса
 * Class PlanfixApartmentFieldTypeCast
 * @package App\Services\Bitrix\Data\Castables
 */
class PlanfixApartmentFieldTypeCast
{
    public static function handle(string $type, mixed $value): mixed
    {
        return method_exists(self::class, $type)
            ? self::$type($value)
            : "";
    }

    // Стадия (ремонт, в аренде и т.п)
    public static function stage($value): string
    {
        return BitrixHelper::getBitrixStageByPlanfix($value);
    }

    // Стадия (ремонт, в аренде и т.п)
    public static function stageUnit($value): string
    {
        return BitrixHelper::getBitrixStageUnitByPlanfix($value);
    }

    // Дата
    public static function date($value): string
    {
        return Carbon::parse($value)->format("Y-m-d H:i:s");
    }

    // Метро
    public static function metro($value): mixed
    {
        return  BitrixHelper::findMetroIdByPlanfix($value);
    }

    // employ
    public static function employ($value): mixed
    {
        return BitrixHelper::findEmployIdByPlanfix($value);
    }

    //
    public static function services($value): mixed
    {
        return BitrixHelper::findServicePaymentTypeIdByPlanfix($value);
    }

    // Задолженность по Ку
    public static function debt($value)
    {
        if (is_array($value))
            return $value['value'] . "|RUB";

        return $value . "|RUB";
    }

    // Задолженность по Ку
    public static function boolean($value)
    {
        return (bool)$value === true ? "Y" : "N";
    }

    // Задолженность по Ку
    public static function contact($value,$badContactBitrixId = 15224)
    {
        if (empty($value))
            return $badContactBitrixId;

        if (!$contact = Contact::where("ext_id", $value)->first())
            return $badContactBitrixId;

        return $contact->bx_id;
    }

    // Задолженность по Ку
    public static function manager($value)
    {
        return $value;
    }

    // Адрес вида "Старокочаловская|57.55;37.25"
    public static function address($value)
    {
        return $value["address"]
            . "|" . $value['latitude']
            . ";"
            . $value['longitude'];
    }


    public static function apartment($value, $default = 994)
    {
        return Task::whereExtId($value)->first()?->bx_id ?? $default;
    }

    // Способ оплаты жильца
    public static function tenantPayment($value, $default = 104)
    {
        // ID Поле Способ оплаты жильца в битриксе
        $collection = BitrixHelper::getEnumByBxId(510);
        return $collection->where('value',mb_strtoupper($value))
            ->first()
            ?->bx_id
            ?? $default;
    }

    // Причина задолженности
    public static function debtReason($value, $default = 694)
    {
        // ID Поле Способ оплаты жильца в битриксе
        $collection = BitrixHelper::getEnumByBxId(530); // BX ID Причина задолженности
        return $collection->where('value',mb_strtoupper($value))
            ->first()
            ?->bx_id
            ?? $default;
    }

    public static function int($value)
    {
        return (float) $value;
    }

    // Причина выселения
    public static function reasonEviction($value, $default = 710)
    {
        $collection = BitrixHelper::getEnumByBxId(486); // ID Поле Причина выселения
        return $collection->where('value',mb_strtoupper($value))
                ->first()
                ?->bx_id
            ?? $default;
    }

}
