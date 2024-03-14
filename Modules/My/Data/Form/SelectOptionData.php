<?php

namespace Modules\My\Data\Form;

use Modules\My\Data\ContentData;
use Spatie\LaravelData\Data;

class SelectOptionData extends Data
{
    public function __construct(
      public int $id,
      public ?string $title,
      public ?ContentData $content,
    ) {}
}
