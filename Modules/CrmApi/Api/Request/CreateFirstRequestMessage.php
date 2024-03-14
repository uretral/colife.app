<?php


namespace  Modules\CrmApi\Api\Request;


use Modules\CrmApi\Api\BridgeApi;

class CreateFirstRequestMessage extends BridgeApi
{
    protected string $url = "request";

    function request($params, $id = false)
    {
        $url = sprintf($this->url, $id);
        return $this->post($url, $params);
    }

}
