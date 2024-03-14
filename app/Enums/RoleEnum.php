<?php

namespace App\Enums;;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self TENANT()
 * @method static self LANDLORD()
 * @method static self PARTNER()
 * @method static self SUPPORT()
 */
final class RoleEnum extends Enum
{
    protected static function values()
    {
        {
            return [
                'TENANT'   => "tenant",
                'LANDLORD' => "landlord",
                'PARTNER'  => "partner",
                'SUPPORT'  => "support",
            ];
        }
    }

}
