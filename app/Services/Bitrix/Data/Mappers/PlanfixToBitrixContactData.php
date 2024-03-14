<?php

namespace App\Services\Bitrix\Data\Mappers;


use App\Services\Bitrix\Data\Castables\PlanfixBirthDateCast;
use App\Services\Bitrix\Data\Castables\PlanfixEmailCast;
use App\Services\Bitrix\Data\Castables\PlanfixGenderIdCast;
use App\Services\Bitrix\Data\Castables\PlanfixCustomFieldsCast;
use App\Services\Bitrix\Data\Castables\PlanfixGroupIdCast;
use App\Services\Bitrix\Data\Castables\PlanfixTypeIdCast;
use App\Services\Bitrix\Data\Castables\TypeIdCast;
use Spatie\LaravelData\Attributes\DataCollectionOf;
use Spatie\LaravelData\Attributes\MapInputName;
use Spatie\LaravelData\Attributes\MapName;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Attributes\Validation\IntegerType;
use Spatie\LaravelData\Attributes\Validation\Nullable;
use Spatie\LaravelData\Attributes\Validation\StringType;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Optional;
use Spatie\LaravelData\Support\Wrapping\WrapExecutionType;


class PlanfixToBitrixContactData extends Data
{
    public function __construct(
        #[Nullable, IntegerType]
        #[MapInputName('ext_id')]
        #[MapOutputName('ext_id')]
        public null|int|Optional $ext_id,

        #[Nullable]
        #[MapInputName('ID')]
        #[MapOutputName('ID')]
        public null|int|Optional $bx_id,

        #[Nullable]
        #[MapInputName('group')]
        #[MapOutputName('TYPE_ID')]
        #[WithCast(PlanfixTypeIdCast::class)]
        public null|string|int|Optional $type_id,

        #[Nullable, StringType]
        #[MapInputName('name')]
        #[MapName('name')]
        #[MapOutputName('NAME')]
        public null|string|Optional $name,

        #[Nullable]
        #[MapInputName('midname')]
        #[MapOutputName('SECOND_NAME')]
        public null|string|Optional $second_name,

        #[Nullable]
        #[MapInputName('lastname')]
        #[MapOutputName('LAST_NAME')]
        public null|string|Optional $last_name,

        #[Nullable]
        #[MapInputName('gender')]
        #[MapOutputName('UF_CRM_1684410059010')]
        #[WithCast(PlanfixGenderIdCast::class)]
        public null|string|Optional $gender_id,

        #[Nullable]
        #[MapInputName('phones')]
        #[MapOutputName('PHONE')]
        #[DataCollectionOf(PlanfixToBitrixMultipleField::class)]
        public DataCollection|Optional $phone,

        #[Nullable, StringType] // Описание жильца
        #[MapInputName('customFieldData')]
        #[MapOutputName('UF_CRM_1684752635835')]
        #[WithCast(PlanfixCustomFieldsCast::class, 'Сводное описание жильца')]
        public null|string|Optional $tenant_description,

        #[Nullable] // Дата рождения
        #[MapInputName('birthDate')]
        #[MapOutputName('UF_CRM_1684417556589')]
        #[WithCast(PlanfixBirthDateCast::class)]
        public null|string $birth_date,

        #[Nullable] // Возраст
        #[MapInputName('customFieldData')]
        #[MapOutputName('UF_CRM_1684417572510')]
        #[WithCast(PlanfixCustomFieldsCast::class, '*Возраст')]
        public null|int|Optional $age,

        #[Nullable]  // Паспорт серия
        #[MapInputName('customFieldData')]
        #[MapOutputName('UF_CRM_1684417596161')]
        #[WithCast(PlanfixCustomFieldsCast::class, 'Серия и номер паспорта')]
        public null|string|Optional $passport_num,

        #[Nullable]  // Паспорт дата выдачи
        #[MapInputName('customFieldData')]
        #[MapOutputName('UF_CRM_1684417781613')]
        #[WithCast(PlanfixCustomFieldsCast::class, 'Паспорт: кем и когда выдан')]
        public null|string|Optional $passport_issued,

        #[Nullable]
        #[MapInputName('email')]
        #[MapOutputName('EMAIL')]
        #[WithCast(PlanfixEmailCast::class)]
        public null|array|Optional $email,

        #[Nullable]
        #[MapInputName('instagram')]
        #[MapOutputName('UF_CRM_1684451624855')]
        public null|string|Optional $instagram,

        #[Nullable]
        #[MapInputName('telegram')]
        #[MapOutputName('UF_CRM_1684451635562')]
        public null|string|Optional $telegram,

        #[Nullable]
        #[MapInputName('tiktok')]
        #[MapOutputName('UF_CRM_1684451646571')]
        public null|string|Optional $tiktok,

        #[Nullable]
        #[MapInputName('vk')]
        #[MapOutputName('UF_CRM_1684451653540')]
        public null|string|Optional $vk,

        #[Nullable]
        #[MapInputName('facebook')]
        #[MapOutputName('UF_CRM_1684451663987')]
        public null|string|Optional $facebook,

        #[Nullable, IntegerType]
        #[MapInputName('lk_registered')]
        #[MapOutputName('UF_CRM_1684488674289')]
        public string|bool|Optional $lk_registered,

        #[Nullable] // Стоимость аренды по договору
        #[MapInputName('customFieldData')]
        #[MapOutputName('UF_CRM_1684490759068')]
        #[WithCast(PlanfixCustomFieldsCast::class, 'Стоимость аренды по договору')]
        public null|int|Optional $rental_price,

        #[Nullable] // Максимум оплаты баллами
        #[MapInputName('customFieldData')]
        #[MapOutputName('UF_CRM_1684490786750')]
        #[WithCast(PlanfixCustomFieldsCast::class, 'Максимум оплаты баллами')]
        public null|int|Optional $max_points_payment,

        #[Nullable] // Описание собственника
        #[MapInputName('customFieldData')]
        #[MapOutputName('UF_CRM_1684495656874')]
        #[WithCast(PlanfixCustomFieldsCast::class, 'Описание собственника')]
        public null|string|Optional $landlord_description,

        #[Nullable]
        #[MapInputName('group')]
        #[MapOutputName('GROUP_ID')]
        #[WithCast(PlanfixGroupIdCast::class)]
        public null|int|Optional $group_id,
    ) {
    }

    public function toCustomArray()
    {
        if (!empty($this->email)){
            $this->email = [$this->email];
        }

        return array_filter($this->transform());
    }


}
