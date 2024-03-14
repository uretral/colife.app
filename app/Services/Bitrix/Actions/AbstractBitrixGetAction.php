<?php


namespace App\Services\Bitrix\Actions;


use App\Services\Bitrix24\Bitrix;
use Illuminate\Support\Collection;

abstract class AbstractBitrixGetAction
{
    protected Bitrix     $bitrix;
    protected Collection $collection;

    public function __construct(Bitrix $bitrix)
    {
        $this->bitrix = $bitrix;
        $this->collection = collect();
    }

}
