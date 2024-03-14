<?php

namespace App\Services\Bitrix\Enum;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self ABOUT()
 * @method static self POSITION()
 * @method static self INTERESTS()
 * @method static self NOTIFICATION_TYPES()
 * @method static self CLEANING()
 * @method static self MASTER()
 * @method static self AUTH_URL()
 * @method static self IS_REGISTERED()
 * @method static self EMAIL_CONFIRMED()
 * @method static self IS_DELETED()
 * @method static self DELETE_REASON()
 * @method static self IM_VK()
 * @method static self IM_FACEBOOK()
 * @method static self IM_TELEGRAM()
 * @method static self IM_INSTAGRAM()
 */
final class BitrixContactFieldsEnum extends Enum
{
    protected static function values()
    {
        {
            return [
                'AUTH_URL'           => "UF_CRM_1685441775445",
                'IS_REGISTERED'      => "UF_CRM_1684488674289",
                'EMAIL_CONFIRMED'    => "UF_CRM_1685441642365",

                'ABOUT'              => "UF_CRM_1684752635835",
                'POSITION'           => "POST",
                'INTERESTS'          => "UF_CRM_1691651011062",
                'CLEANING'           => "UF_CRM_1690371758325",
                'MASTER'             => "UF_CRM_1690371773475",
                'NOTIFICATION_TYPES' => "UF_CRM_1690371870540",
                'IS_DELETED'         => "UF_CRM_1691135233256",
                'DELETE_REASON'      => "UF_CRM_1691135249366",

                'IM_VK'              => "UF_CRM_1690371487806",
                'IM_FACEBOOK'        => "UF_CRM_1690371568763",
                'IM_TELEGRAM'        => "UF_CRM_1690371568764",
                'IM_INSTAGRAM'       => "UF_CRM_1690371568765",
            ];
        }
    }

}
