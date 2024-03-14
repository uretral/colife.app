<?php

namespace App\Services\Bitrix\Enum;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self APPARTMENTS()
 * @method static self UNITS()
 */
final class BitrixEntityTypeIdEnum extends Enum
{
    protected static function values()
    {
        {
            return [
                'APPARTMENTS' => config('bitrix24.SP_APPARTMENTS_ID'),
                'UNITS'       => config('bitrix24.SP_UNITS_ID'),
            ];
        }
    }

    protected static function labels(): array
    {
        return [
            'APPARTMENTS' => 'Апартаменты',
            'UNITS'       => 'Юниты',
        ];
    }
}
