<?php

namespace Modules\Lk\Data\Appeal;

use Spatie\LaravelData\Data;

class AppealFileData extends Data
{
    public function __construct(
      public ?int $id,
      public ?int $appeal_id,
      public ?int $message_id,
      public ?string $path,
    ) {}
}




