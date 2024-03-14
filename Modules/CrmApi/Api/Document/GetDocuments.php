<?php


namespace  Modules\CrmApi\Api\Document;


use Modules\CrmApi\Api\BridgeApi;

class GetDocuments extends BridgeApi
{
    protected string $url = "document/%d";

    function request($params, $id = false)
    {
        return $this->get(
            uri: sprintf($this->url, $id),
            data: $params
        );
    }

}
