<?php


namespace  Modules\CrmApi\Api\Estate;


use Modules\CrmApi\Api\BridgeApi;

class GetEstateList extends BridgeApi
{

    protected string $url = "estate/%d";

    function request($params, $id = false)
    {
        $url = sprintf($this->url, $id);

        $response = $this->get($url, $params);
        if (empty($response) || empty($response?->data))
            return [];

        return $response->data;
    }

}
