<?php


namespace Modules\CrmApi\Api;


use Ixudra\Curl\CurlService;

abstract class BridgeApi
{
    protected CurlService $curl;
    private string $baseUri;
    private string $api_token;
    private string $login;

    public function __construct()
    {
        $this->curl = new CurlService();
        $this->baseUri = config('api.bridge.url');
        $this->login = config('api.bridge.login');
        $this->api_token = config('api.bridge.api_token');
    }

    public function get(string $uri, array $data): mixed
    {
        $data = self::getData($data);
        $response = $this->curl->to($this->baseUri . $uri)
            ->withBearer($this->api_token)
            ->withData($data)
            ->asJson()
//            ->enableDebug("bridge_debug.log")
            ->get();

        return $response;

    }

    public function post(string $uri, array $data): mixed
    {
        $data = self::getData($data);
        return $this->curl->to($this->baseUri . $uri)
            ->withBearer($this->api_token)
            ->withData($data)
            ->asJson()
//            ->enableDebug("bridge_debug.log")
            ->post();

    }

    public function put(string $uri, array $data): mixed
    {
        $data = self::getData($data);
        return $this->curl->to($this->baseUri . $uri)
            ->withBearer($this->api_token)
            ->withData($data)
            ->asJson()
//            ->enableDebug("bridge_debug.log")
            ->put();

    }

    private function getData(array $data){
        $params['service'] = $this->login;
        $params['lang'] = app()->getLocale();
        return array_merge($params, $data);
    }

    abstract function request($params, $id = false);

}
