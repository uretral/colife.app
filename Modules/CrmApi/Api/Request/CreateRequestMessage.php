<?php


namespace  Modules\CrmApi\Api\Request;


use Modules\CrmApi\Api\BridgeApi;

class CreateRequestMessage extends BridgeApi
{
    protected string $url = "request/%d";

    function request($params, $id = false)
    {
        $url = sprintf($this->url, $id);
        return $this->put($url, $params);
    }

}
