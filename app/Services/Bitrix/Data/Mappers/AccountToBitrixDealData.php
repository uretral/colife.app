<?php

namespace App\Services\Bitrix\Data\Mappers;


use App\Services\Bitrix\Data\Castables\DealPriorityCast;
use App\Services\Bitrix\Data\Castables\DealStageCast;
use App\Services\Bitrix\Data\Castables\FileCast;
use App\Services\Bitrix\Data\Castables\PlanfixAppartmensValuesCast;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;


class AccountToBitrixDealData extends Data
{
    public function __construct(

        #[MapOutputName('TITLE')]
        public ?string $title,

        // Приоритет обращения
        #[MapOutputName('UF_CRM_1686150568517')]
        #[WithCast(DealPriorityCast::class,'UF_CRM_1686150568517')]
        public ?int $priority,

        // Стадия-статус
        #[MapOutputName('STAGE_ID')]
        #[WithCast(DealStageCast::class)]
        public ?string $stage_id,

        // Стадия-статус
        #[MapOutputName('CATEGORY_ID')]
        public ?string $category_id,

        // Жилец
        #[MapOutputName('CONTACT_ID')]
        public ?int $contact_id,

        // Юниты
        #[MapOutputName('UF_CRM_1684486336')]
        public ?int $unit_id,

        // Обращение
        #[MapOutputName('UF_CRM_1687256939116')]
        public ?string $message,

        // Файлы
        #[MapOutputName('UF_CRM_1687256998974')]
        #[WithCast(FileCast::class)]
        public mixed $files,

        #[MapOutputName('OPPORTUNITY')]
        public ?float $opportunity = 0.00,


    ) {
    }


}
