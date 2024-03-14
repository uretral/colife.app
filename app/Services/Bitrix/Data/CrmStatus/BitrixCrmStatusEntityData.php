<?php

namespace App\Services\Bitrix\Data\CrmStatus;

use App\Services\Bitrix\Actions\Crm_Status\UpdateBitrixCrmStatusesEntityAction;
use App\Services\Bitrix\Models\BitrixCrmStatusEntity;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\Required;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\Optional;

class BitrixCrmStatusEntityData extends Data
{
    public function __construct(

        #[Nullable, IntegerType]
        public null|int|Optional $id,

        #[Required, IntegerType]
        #[MapInputName('ID')]
        public int $bx_id,

        #[Required, StringType]
        #[MapInputName('ENTITY_ID')]
        public string $bx_name,

        #[Required, StringType]
        #[MapInputName('ENTITY_ID')]
        public string $name,


    ) {
        $this->updateOrCreateEntity();
    }

    public function updateOrCreateEntity(){

        $model = app(UpdateBitrixCrmStatusesEntityAction::class)->run($this);
        $this->id = $model->id;

    }
}
