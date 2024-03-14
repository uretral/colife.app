<?php

namespace Modules\My\Data\Webhook;

use Spatie\LaravelData\Data;

class BridgeWebhookData extends Data
{
    public function __construct(
        public ?string $event,
        public mixed $data,
    ) {
    }
}
