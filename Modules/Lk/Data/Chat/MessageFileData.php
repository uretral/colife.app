<?php


namespace Modules\Lk\Data\Chat;


use Illuminate\Support\Str;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Data;

class MessageFileData extends Data
{
    protected $schema = "https://";

    public function __construct(
        #[MapInputName("path")]
        public ?string $url,
        public ?string $link,
        #[MapInputName("filename")]
        public ?string $name,
    )
    {
        $this->url = $this->getFileUrl();
    }

    protected function getUri(){

        if(config('app.env') === 'local')
            $this->schema = "http://";
        return $this->schema . config('app.domain_tenant') ;
    }

    protected function getFileUrl(){
        if ($this->url)
            return self::getUri() . "/" . Str::replace("public","storage",$this->url);
    }
}
