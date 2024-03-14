<?php


namespace  Modules\CrmApi\Api\Payments;


use Modules\CrmApi\Api\BridgeApi;

class GetFinancialData extends BridgeApi
{
    protected string $url = "payment/%d/financial-data";

    function request($params, $id = false)
    {
        return $this->get(
            uri: sprintf($this->url, $id),
            data: $params
        );
    }

}
