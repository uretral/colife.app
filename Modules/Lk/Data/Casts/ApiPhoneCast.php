<?php


namespace Modules\Lk\Data\Casts;


use App\Services\Bitrix\Models\BitrixUserField;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class ApiPhoneCast implements Cast
{

    /**
     * @throws \Exception
     */
    public function cast(DataProperty $property, mixed $value, array $context): string
    {

        if (!empty($value) && is_array($value)){
            return $value[0]?->{'VALUE'} ?? "";
        }
        return "";

    }

}
