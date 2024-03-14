<?php


namespace App\Services\Bitrix\Data\Castables;


use App\Services\Bitrix\Models\BitrixContactUserFieldsValues;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class GenderIdCast implements Cast
{
    protected $bxFieldName = 'UF_CRM_1684410059010';

    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {


        if(is_int($value)){
            return BitrixContactUserFieldsValues::find($value)->bx_id;
        } else {
            return BitrixContactUserFieldsValues::where('bx_id',$value)->first()?->id ?? 3;
        }

    }
}
