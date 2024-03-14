<?php

namespace Modules\Lk\Data\User;

use Modules\Lk\Data\ContentData;
use Spatie\LaravelData\Data;

class UserDeleteReasonData extends Data
{
    public function __construct(
      public ?int $id,
      public ?int $active,
      public ?int $order,
      public ?string $title,
      public ?ContentData $content,
      public ?string $created_at,
      public ?string $updated_at,
    ) {}
}





