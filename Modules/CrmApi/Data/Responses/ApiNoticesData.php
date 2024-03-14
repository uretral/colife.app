<?php


namespace Modules\CrmApi\Data\Responses;


use Spatie\LaravelData\Data;

class ApiNoticesData extends Data
{
    public function __construct(
        public ?string $type,
        public ?string $title,
        public ?string $description,
        public ?string $deadline,
    ){

    }

}
