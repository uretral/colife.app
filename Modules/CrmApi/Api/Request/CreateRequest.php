<?php


namespace  Modules\CrmApi\Api\Request;


use Modules\CrmApi\Api\BridgeApi;

class CreateRequest extends BridgeApi
{
    protected string $url = "request";

    function request($params, $id = false)
    {
        return $this->post($this->url, $params);
    }

}
