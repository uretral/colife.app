<?php


namespace  Modules\CrmApi\Api\Contact;


use Modules\CrmApi\Api\BridgeApi;

class ContactRegistered extends BridgeApi
{
    protected string $url = 'contact/%d/registered';

    function request($params, $id = false)
    {
        $url = sprintf($this->url, $id);
        return $this->post($url, $params);
    }
}
