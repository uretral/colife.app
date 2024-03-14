<?php


namespace  Modules\CrmApi\Api\Document;


use Modules\CrmApi\Api\BridgeApi;

class GetMyDocumentList extends BridgeApi
{

    protected string $url = "document/%d";

    function request($params, $id = false)
    {
        $url = sprintf($this->url, $id);

        $response = $this->get($url, $params);
        if (empty($response) || empty($response?->data))
            return [];

        return $response->data;
    }

}
