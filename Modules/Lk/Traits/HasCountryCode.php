<?php

namespace Modules\Lk\Traits;

use Modules\Lk\Repositories\UserRepository;

trait HasCountryCode
{
    public function newQuery(): \Illuminate\Database\Eloquent\Builder
    {
        return parent::newQuery()->where('country_code', '=', UserRepository::getAuthUserCountryCode());
    }
}
