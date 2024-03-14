<?php

namespace App\Helpers;

class BladeHelper
{

    public static function phoneFormat($phone, $format = '+# ### ### ## ##', $mask = '#'): string
    {
        $phone = preg_replace('/[^0-9]/', '', $phone);

        if (is_array($format)) {
            if (array_key_exists(strlen($phone), $format)) {
                $format = $format[strlen($phone)];
            } else {
                return false;
            }
        }

        $pattern = '/' . str_repeat('([0-9])?', substr_count($format, $mask)) . '(.*)/';

        $format = preg_replace_callback(
            str_replace('#', $mask, '/([#])/'),
            function () use (&$counter) {
                return '${' . (++$counter) . '}';
            },
            $format
        );

        return ($phone) ? trim(preg_replace($pattern, $format, $phone, 1)) : false;
    }

    public static function bonusFormat($bonus): string
    {
        switch ($bonus = 0) {
            case in_array($bonus, [11, 12, 13, 14]):
                return $bonus . ' ' . __('profile-bonuses');
            case $bonus % 10 == 1:
                return $bonus . ' ' . __('profile-bonus');
            case in_array($bonus % 10, [2, 3, 4]):
                return $bonus . ' ' . __('profile-bonused');
            default:
                return $bonus . ' ' . __('profile-bonuses');
        }

    }
}
