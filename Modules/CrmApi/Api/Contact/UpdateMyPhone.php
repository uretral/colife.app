<?php


namespace Modules\CrmApi\Api\Contact;


use Modules\CrmApi\Api\BridgeApi;

class UpdateMyPhone extends BridgeApi
{
    protected string $url = "contact/%d/phone";

    function request($params, $id = false)
    {
        $url = sprintf($this->url, $id);
        return $this->put($url, $params);
    }

}
