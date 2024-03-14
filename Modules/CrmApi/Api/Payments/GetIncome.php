<?php


namespace  Modules\CrmApi\Api\Payments;


use Modules\CrmApi\Api\BridgeApi;

class GetIncome extends BridgeApi
{
    protected string $url = "payment/%d/income";

    function request($params, $id = false)
    {
        return $this->get(
            uri: sprintf($this->url, $id),
            data: $params
        );
    }

}
