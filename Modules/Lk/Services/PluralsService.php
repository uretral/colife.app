<?php


namespace Modules\Lk\Services;


class PluralsService
{

    public static function cleaningPeriods($value): string
    {

        if (is_array($value) && count($value) > 1){
            return __('notification-cleaning-period-multiple') . " "
                . PHP_EOL
                . implode("&nbsp;" . __('notification-cleaning-period-separator') . "&nbsp;",
                    $value
                );
        } elseif (is_array($value) && !empty($value)){
            return __('notification-cleaning-period-single') . " " . $value[0];
        }
        return '';
    }

}
