<?php


namespace Modules\CrmApi\Api\Contact;


use Modules\CrmApi\Api\BridgeApi;

class UpdateMyContact extends BridgeApi
{
    protected string $url = "contact/%d/person";

    function request($params, $id = false)
    {
        $url = sprintf($this->url, $id);
        return $this->put($url, $params);
    }

}
