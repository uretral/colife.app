<?php

namespace Modules\My\Data\User;

use Livewire\Wireable;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;

class UserContactData extends Data implements Wireable
{
    use WireableData;

    public function __construct(
      public int $id,
      public ?int $user_id,
      public ?string $name,
      public ?string $phone,
      public ?string $created_at,
      public ?string $updated_at,
      public ?string $deleted_at,
    ) {}
}
