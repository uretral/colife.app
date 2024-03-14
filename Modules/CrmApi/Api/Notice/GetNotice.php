<?php


namespace  Modules\CrmApi\Api\Notice;


use Modules\CrmApi\Api\BridgeApi;

class GetNotice extends BridgeApi
{
    protected string $url = "notice/";

    function request($params, $id = false)
    {
        $response = $this->get($this->url . $id, $params);
        if (empty($response) || empty($response?->data))
            return [];



        return $response->data;
    }

}
