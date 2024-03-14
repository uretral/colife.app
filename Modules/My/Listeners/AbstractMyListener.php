<?php


namespace Modules\My\Listeners;


use Illuminate\Support\Facades\Log;

abstract class AbstractMyListener
{
    public function __construct()
    {
        Log::channel('my')->info(static::class);
    }

}
