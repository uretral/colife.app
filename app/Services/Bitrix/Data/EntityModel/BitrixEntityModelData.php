<?php

namespace App\Services\Bitrix\Data\EntityModel;

use App\Services\Bitrix\Data\Castables\EntityModelCast;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;

class BitrixEntityModelData extends Data
{
    public function __construct(

        #[Required]
        public string $entityId,

        #[Required]
        #[MapInputName('entityId')]
        #[WithCast(EntityModelCast::class)]
        public string $model,
    ) {
    }
}
