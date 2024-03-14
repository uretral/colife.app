<?php

namespace App\Services\Bitrix\Data\UserField;

use App\Services\Bitrix\Data\Castables\EntityModelCast;
use Illuminate\Support\Optional;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class BitrixUserFieldData extends Data
{
    public function __construct(

        #[MapInputName('id')]
        #[MapOutputName('id')]
        public ?int $bx_id,
        public ?int $ext_id,
        public ?string $entityId,

        #[MapInputName('entityId')]
        #[WithCast(EntityModelCast::class)]
        public ?string $model,

        public ?string $fieldName,
        public ?string $userTypeId,
        public ?string $xmlId,
        public ?int $sort,
        public ?string $multiple,
        public ?string $mandatory,
        public ?string $showFilter,
        public ?string $showInList,
        public ?string $editInList,
        public ?string $isSearchable,
        public ?array $settings,
        public ?array $editFormLabel,
        public ?array $listColumnLab,
        public ?array $listFilterLab,
        public ?array $errorMessage,
        public ?array $helpMessage,


        #[Nullable]
        #[MapInputName('enum')]
        #[MapOutputName('enum')]
        #[DataCollectionOf(BitrixUserFieldEnumData::class)]
        public ?DataCollection $enum,
    ) {
    }

}
