<?php

namespace Modules\My\Data\Request;

use Modules\My\Data\ContentData;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class AppealThemeTypeData extends Data
{
    public function __construct(
        public ?int $id,
        public ?int $theme_id,
        public ?string $title,
        #[MapInputName('priority.title')]
        public ?string $priority,
        public ?ContentData $content,
    ) {
    }
}




