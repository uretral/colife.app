<?php

namespace Modules\My\Repositories\FakeApi;

use Ixudra\Curl\CurlService;
use \Modules\My\Entities\XCookie;
use Modules\My\Entities\XUser;

class ApiGenerator
{

    const BEARER = '7dmfm5s19sq3apzekfqklbqo3jk4nib2wgr0ipl6';
    private CurlService $curl;

    private $params = 'LastName,FirstName,FatherName,DateOfBirth,Phone,Login,Email,Gender,PasportNum,PasportCode,PasportOtd,PasportDate,Address,Country,Region,City,Street,House,Apartment,bankCorr,bankBIK,bankINN,bankKPP,bankNum,bankClient,bankCard,bankDate,bankCVC';


    public function __construct()
    {
        $this->curl = new CurlService();
    }



    public function get(string $code): mixed
    {
        return $this->curl->to("https://api.json-generator.com/templates/$code/data")
            ->withBearer(self::BEARER)
            ->asJson()
            ->get();
    }

    public function handle(string $code){

        return request()->exists('jg') && request('jg') == 1 ? $this->updatePayload($code) : $this->payload($code);
    }

    public function updatePayload($code) {
         XCookie::updateOrCreate(['value' => $code],[
            'json' => $this->get($code)
        ]);
          return $this->payload($code);
    }

    public function payload($code) {
        return XCookie::where('value', $code)->first()->getAttribute('json')[0];
    }



    public function fakeUser() {
       $randomdatatools =  file_get_contents('https://api.randomdatatools.ru/?count=100&unescaped=false&params=LastName,FirstName,FatherName,DateOfBirth,Phone,Login,Email,Gender,PasportNum,PasportCode,PasportOtd,PasportDate,Address,Country,Region,City,Street,House,Apartment,bankCorr,bankBIK,bankINN,bankKPP,bankNum,bankClient,bankCard,bankDate,bankCVC');
       $obj = json_decode($randomdatatools, true);

       foreach ($obj as $item) {
           if(in_array($item['City'],['г. Москва','г. Санкт-Петербург','г. Краснодар'])) {
               $item['Avatar'] = file_get_contents('https://api.multiavatar.com/'.$item['bankClient']);
               sleep(1);
              XUser::updateOrCreate(['Address' => $item['Address']],$item);
           }
       }

       return XUser::count() ;
    }

}
