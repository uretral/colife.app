<?php


namespace  Modules\CrmApi\Api\Contact;


use Modules\CrmApi\Api\BridgeApi;

class ContactEmailConfirmed extends BridgeApi
{
    protected string $url = 'contact/%d/confirmed';

    function request($params, $id = false)
    {
        $url = sprintf($this->url, $id);
        return $this->post($url, $params);
    }
}
