<?php

namespace App\Services\Bitrix\Enum;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self CLIENT()
 * @method static self LANDLORD()
 * @method static self SUPPLIER()
 * @method static self PARTNER()
 * @method static self UC_NEAM89()
 * @method static self UC_MDVH8X()
 * @method static self OTHER()
 */
final class TypeIdEnum extends Enum
{
    protected static function values()
    {
        {
            return [
                'CLIENT'    => 35,
                'LANDLORD'  => 208,
                'SUPPLIER'  => 37,
                'PARTNER'   => 39,
                'UC_NEAM89' => 762, // Бывший жилец
                'UC_MDVH8X' => 764, // Бывший собственник
                'OTHER'     => 41,
            ];
        }
    }

    protected static function labels(): array
    {
        return [
            'CLIENT'    => 'CLIENT',
            'LANDLORD'  => '1',
            'SUPPLIER'  => 'SUPPLIER',
            'PARTNER'   => 'PARTNER',
            'UC_NEAM89' => 'UC_NEAM89',
            'UC_MDVH8X' => 'UC_MDVH8X',
            'OTHER'     => 'OTHER',
        ];
    }
}
