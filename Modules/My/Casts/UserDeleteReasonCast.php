<?php


namespace Modules\My\Casts;


use Modules\My\Entities\UserDeleteReason;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class UserDeleteReasonCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {
        return UserDeleteReason::find($value)?->title ?: '';
    }
}
