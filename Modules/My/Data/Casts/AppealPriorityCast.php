<?php


namespace Modules\My\Data\Casts;


use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class AppealPriorityCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {

        return !empty($context['themeType']['priority'])
            ? $context['themeType']['priority']
            : $context['theme']['priority'];

    }
}
