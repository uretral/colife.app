<?php

namespace Modules\My\Traits;

use Modules\My\Repositories\UserRepository;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

trait HasCountryCode
{

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function newQuery($excludeDeleted = true)
    {
        $adminCountryConfig = config('admin.extensions.multi-language.cookie-country', 'country');

        return parent::newQuery($excludeDeleted)
            /* Если есть country_code */
            ->when(UserRepository::getAuthUserCountryCode(), function ($q) {
                $q->where('country_code', UserRepository::getAuthUserCountryCode());
            })
            /* Если нет country_code прячем контент */
            ->when(UserRepository::getAuthUserCountryCode() === null && !\Cookie::has($adminCountryConfig), function ($q) {
                $q->where('country_code', 'no-country-code');
            })
            /* Для админа */
            ->when(\Cookie::has($adminCountryConfig), function ($q) use ($adminCountryConfig) {
                $q->where('country_code', \Cookie::get($adminCountryConfig));
            });
    }
}
