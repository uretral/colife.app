<?php


namespace Modules\CrmApi\Data\Responses;


use Spatie\LaravelData\Data;

class ApiAppealCreatedData extends Data
{
    public function __construct(
        public ?int $bx_user_id,
        public ?int $bx_deal_id,
        public ?int $bx_activity_id,
    ){

    }

}
