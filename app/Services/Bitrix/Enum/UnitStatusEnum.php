<?php

namespace App\Services\Bitrix\Enum;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self NEW()
 * @method static self TO_RENT()
 * @method static self CLIENT()
 * @method static self EVICTION()
 * @method static self BOOKED()
 * @method static self ARCHIVE()
 * @method static self SUCCESS()
 * @method static self FAIL()
 */
final class UnitStatusEnum extends Enum
{
    protected static int $dynamicFieldId = 12;

    protected static function prefix()
    {
        $unitEntityId = config('bitrix24.SP_UNITS_ID');
        return "DT{$unitEntityId}_" . self::$dynamicFieldId . ":";
    }

    protected static function values()
    {
        {
            return [
                'NEW'      => self::prefix() . "NEW",
                'TO_RENT'  => self::prefix() . "PREPARATION",
                'CLIENT'   => self::prefix() . "CLIENT",
                'EVICTION' => self::prefix() . "UC_QGIB2X",
                'BOOKED'   => self::prefix() . "UC_CGWPG7",
                'ARCHIVE'  => self::prefix() . "UC_2TDBUK",
                'SUCCESS'  => self::prefix() . "SUCCESS",
                'FAIL'     => self::prefix() . "FAIL",
            ];
        }
    }
}
