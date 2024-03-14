<?php

namespace Modules\Lk\Data;

use Livewire\Wireable;
use Spatie\LaravelData\Concerns\WireableData;
use Spatie\LaravelData\Data;

class FileData extends Data implements Wireable
{
    use WireableData;

    public function __construct(
        public ?int    $id,
        public ?int    $model_id,
        public ?string $model_type,
        public ?string $type,
        public ?string $name,
        public ?string $title,
        public ?string $key,
        public ?string $checksum,
        public ?string $contents,
        public ?string $url,
        public ?string $created_at,
        public ?string $disk = 'public',
    )
    {
        if (empty($this->created_at))
            $this->created_at = now();
    }
}







