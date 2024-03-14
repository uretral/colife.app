<?php


namespace Modules\My\Data\Casts;


use Illuminate\Support\Carbon;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class UserAvatarCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {
        return $value->where("type","avatar")->first()?->url;
    }
}
