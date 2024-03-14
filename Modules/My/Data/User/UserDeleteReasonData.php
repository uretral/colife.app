<?php

namespace Modules\My\Data\User;

use Livewire\Wireable;
use Modules\Lk\Data\ContentData;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;

class UserDeleteReasonData extends Data implements Wireable
{
    use WireableData;

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





