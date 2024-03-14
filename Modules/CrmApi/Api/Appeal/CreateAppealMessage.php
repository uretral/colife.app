<?php


namespace  Modules\CrmApi\Api\Appeal;


use Modules\CrmApi\Api\BridgeApi;

class CreateAppealMessage extends BridgeApi
{
    protected string $url = "appeal/";

    function request($params, $id = false)
    {
        return $this->put($this->url . $id, $params);
    }

}
