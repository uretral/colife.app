<?php


namespace  Modules\CrmApi\Api\Appeal;


use Modules\CrmApi\Api\BridgeApi;

class CreateAppeal extends BridgeApi
{
    protected string $url = "appeal";

    function request($params, $id = false)
    {
        return $this->post($this->url, $params);
    }

}
