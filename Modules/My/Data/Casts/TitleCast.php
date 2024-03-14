<?php


namespace Modules\My\Data\Casts;


use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class TitleCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {
        $title = '';
        if (!empty($context['theme']['title']))
            $title .= $context['theme']['title'];

        if (!empty($context['themeType']['title']))
            $title .= ".{$context['themeType']['title']}";


       return $title;
    }
}
