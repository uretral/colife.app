<?php


namespace  Modules\CrmApi\Api\Appeal;


use Modules\CrmApi\Api\BridgeApi;

class CreateAppealRate extends BridgeApi
{
    protected string $url = "appeal/rate";

    function request($params, $id = false)
    {
        return $this->post($this->url, $params);
    }

}
