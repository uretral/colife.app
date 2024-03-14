<?php

namespace Modules\My\Helpers;

class PluralsService
{

    public static function rooms($cnt): string
    {

        if ($cnt == 1)
            return $cnt." ".__('estate-unit-one');
        elseif (in_array($cnt, [2, 3, 4]))
            return $cnt." ".__('estate-unit-many');
        else
            return $cnt." ".__('estate-unit-decimal');
    }

    public static function units($cnt): string
    {

        if ($cnt == 1)
            return $cnt." ".__('estate-sleeper-one');
        elseif (in_array($cnt, [2, 3, 4]))
            return $cnt." ".__('estate-sleeper-many');
        else
            return $cnt." ".__('estate-sleeper-decimal');
    }

    public static function state($state): string
    {
        if (empty($state))
            $state = 0;

        $arrState = [
            0 => __('estate-fully-commissioned'),
            1 => __('estate-fully-commissioned'),
            2 => __('estate-partially-commissioned'),
            3 => __('estate-in-search-of-tenants'),
            4 => __('estate-rent-holidays'),
        ];
        return $arrState[$state];
    }

    public static function paymentMethod($key): string
    {
        $paymentMethod = [
            1 => __('payments-cache'),
            2 => __('payments-bank'),
        ];
        return $paymentMethod[$key];

    }

    public function paymentType($key)
    {
        $paymentType = [
            1 => __('payments-cache'),
            2 => __('payments-bank')
        ];
        return $paymentType[$key];
    }

    public static function paymentPurpose($key)
    {
        $paymentType = [
            1 => __('payments-rent-services'),
            2 => __('payments-utility-services'),
            3 => __('payments-additional-services')
        ];
        return $paymentType[$key];
    }
}
