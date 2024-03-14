<?php


namespace App\Services\Bitrix\Data\Castables;


use App\Services\Bitrix\Models\BitrixUserField;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class PhoneCast implements Cast
{

    /**
     * @throws \Exception
     */
    public function cast(DataProperty $property, mixed $value, array $context): string
    {

        if (!empty($value) && is_object($value)){
           return $value?->first()?->value ?? '';
        }
        return "";

    }

}
