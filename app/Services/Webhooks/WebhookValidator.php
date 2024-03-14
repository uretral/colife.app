<?php


namespace App\Services\Webhooks;


use Illuminate\Http\Request;
use Spatie\WebhookClient\SignatureValidator\SignatureValidator;
use Spatie\WebhookClient\WebhookConfig;

class WebhookValidator implements SignatureValidator
{

    public function isValid(Request $request, WebhookConfig $config): bool
    {
        return true;  // TODO: Implement isValid() method.
    }
}
