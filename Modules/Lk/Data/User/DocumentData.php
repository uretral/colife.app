<?php

namespace Modules\Lk\Data\User;

use Modules\Lk\Data\ContentData;
use Spatie\LaravelData\Data;

class DocumentData extends Data
{
    public function __construct(
        public int          $id,
        public ?string      $title,
        public ?string      $description,
        public ?ContentData $content,
        public ?string      $created_at,
        public ?string      $updated_at,
        public ?string      $deleted_at,
    )
    {
    }
}
