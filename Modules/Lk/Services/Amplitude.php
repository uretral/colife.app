<?php

namespace Modules\Lk\Services;

use Ixudra\Curl\CurlService;

abstract class Amplitude
{

    const KEY = "f46738e39b55e8edfd6a2c253fbd3d24";
    const URL = "https://api2.amplitude.com/2/httpapi";

    public static function post($events)
    {
        $curl = new CurlService();
        return $curl->to(self::URL)
            ->withData([
                "api_key" => self::KEY,
                "events" => [$events]
            ])
            ->asJson()
            ->post();
    }

    static function getUser(): \Modules\Lk\Entities\User|\Illuminate\Contracts\Auth\Authenticatable|null
    {
        return \Auth::guard('lk')->user();
    }

    static function userId()
    {
        return self::getUser() ? self::getUser()->getAttribute('email') : 'unregistered';
    }

    static function language()
    {
        return self::getUser() ? self::getUser()->getAttribute('locale') : 'default';
    }

    abstract static function handle(array $attributes = []);
}
