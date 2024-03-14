<?php

namespace Modules\Lk\Data\Settings;

use  Modules\Lk\Data\FileData;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class SettingsData extends Data
{
    public function __construct(
        public int $id,
        public ?string $title,
        public ?string $description,
        public ?string $slug,
        #[DataCollectionOf(FileData::class)]
        public ?DataCollection $files,
    ) {
    }
}
