<?php

namespace App\Services\Bitrix\Data\Mappers;


use App\Services\Bitrix\Data\Castables\PlanfixTemplateIdCast;
use App\Services\Bitrix\Data\Castables\PlanfixUnitValuesCast;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Support\Wrapping\WrapExecutionType;


class PlanfixToBitrixUnitItemData extends Data
{
    public function __construct(

        public ?int $ext_id,

        public ?int $bx_id,

        #[Required, IntegerType]
        #[MapInputName('template')]
        #[WithCast(PlanfixTemplateIdCast::class)]
        public int $bx_entity_type_id,

        #[MapInputName('status')]
        #[WithCast(PlanfixUnitValuesCast::class)]
        #[DataCollectionOf(PlanfixToBitrixItemValuesData::class)]
        public DataCollection $values,
    ) {
    }


}
