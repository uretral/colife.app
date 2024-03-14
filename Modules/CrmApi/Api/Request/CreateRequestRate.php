<?php


namespace  Modules\CrmApi\Api\Request;


use Modules\CrmApi\Api\BridgeApi;

class CreateRequestRate extends BridgeApi
{
    protected string $url = "request/rate";

    function request($params, $id = false)
    {
        return $this->post($this->url, $params);
    }

}
