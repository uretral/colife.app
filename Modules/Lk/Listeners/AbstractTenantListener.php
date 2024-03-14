<?php


namespace Modules\Lk\Listeners;


use Illuminate\Support\Facades\Log;

abstract class AbstractTenantListener
{
    public function __construct()
    {
        Log::channel('tenant')->info(static::class);
    }

}
