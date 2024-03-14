<?php

namespace Modules\My\Data\Request;

use Modules\My\Data\ContentData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class RequestThemeData extends Data
{
    public function __construct(
        public ?int         $id,
        public ?string      $title,
        #[MapInputName('priority.title')]
        public ?string      $priority,
        public ?ContentData $content,
    )
    {
    }
}
