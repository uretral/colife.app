<?php

namespace App\Services\Bitrix\Enum;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self NEW()
 * @method static self PROCESS()
 * @method static self CLOSED()
 */
final class AppealStatusEnum extends Enum
{
    protected static function values()
    {
        {
            return [
                'NEW'    => 1,
                'PROCESS'  => 2,
                'CLOSED'  => 3,
            ];
        }
    }
}
