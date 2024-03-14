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

class FileCast implements Cast
{

    /**
     * @throws \Exception
     */
    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {

        if (!empty($value) && is_array($value)){
            foreach ($value as $filename){
                $content = file_get_contents($filename['url']);
                $files[]["fileData"] = [$filename['url'],base64_encode($content)];
            }
            return $files;
        }

        return null;

    }

}
