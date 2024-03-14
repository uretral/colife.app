<?php

namespace Modules\My\Services;

use Ixudra\Curl\CurlService;

abstract class Amplitude
{

    const KEY = "6cc7851fa7cd04fdecc609d57f8bfb4e";
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

    static function getUser(): \Modules\My\Entities\User|\Illuminate\Contracts\Auth\Authenticatable|null
    {
        return \Auth::guard('my')->user();
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
