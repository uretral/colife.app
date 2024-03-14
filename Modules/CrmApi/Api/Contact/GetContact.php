<?php


namespace  Modules\CrmApi\Api\Contact;


use Modules\CrmApi\Api\BridgeApi;

class GetContact extends BridgeApi
{
    protected string $url = "contact/%d";

    function request($params, $id = false)
    {
        return $this->get( sprintf($this->url, $id), $params);
    }

}
