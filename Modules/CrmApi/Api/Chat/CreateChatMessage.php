<?php


namespace  Modules\CrmApi\Api\Chat;


use Modules\CrmApi\Api\BridgeApi;

class CreateChatMessage extends BridgeApi
{
    protected string $url = "chat";

    function request($params, $id = false)
    {
        return $this->post($this->url, $params);
    }

}
