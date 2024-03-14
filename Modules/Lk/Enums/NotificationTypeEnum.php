<?php


namespace Modules\Lk\Enums;


use Spatie\Enum\Enum;

/**
 * @method static self Success()
 * @method static self Error()
 * @method static self Confirm()
 */
final class NotificationTypeEnum extends Enum
{
    protected static function values()
    {
        {
            return [
                'Success'    => "onNotify",
                'Error'  => "onError",
                'Confirm'  => "onConfirm",
            ];
        }
    }

    protected static function labels()
    {
        {
            return [
                'Success'    => "success",
                'Error'  => "error",
                'Confirm'  => "confirm",
            ];
        }
    }
}
