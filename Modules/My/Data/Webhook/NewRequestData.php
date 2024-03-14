<?php

namespace Modules\My\Data\Webhook;

use Spatie\LaravelData\Data;

class NewRequestData extends Data
{
    public function __construct(
        public ?int $deal_id,
        public ?int $contact_id,
        public ?string $question,
        public ?string $priority,
        public mixed $files,
        public ?string $theme,
    ) {
        // TODO: Поправить
        if (empty($this->theme)){
            $this->theme = 'Запрос';
        }
    }
}
