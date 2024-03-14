<?php


namespace  Modules\CrmApi\Api\Contact;


use Modules\CrmApi\Api\BridgeApi;

class UpdateLkProfile extends BridgeApi
{
    protected string $url = "contact/";

    function request($params, $id = false)
    {
        return $this->put($this->url . $id, $params);
    }

}
