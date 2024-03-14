<?php

namespace App\Services\Bitrix\Data\Mappers;


use App\Services\Bitrix\Data\Castables\DateTimeCast;
use App\Services\Bitrix\Data\Castables\GenderIdCast;
use App\Services\Bitrix\Data\Castables\PhoneCast;
use App\Services\Bitrix\Data\Castables\SourceIdCast;
use App\Services\Bitrix\Data\Castables\TypeIdCast;
use App\Services\Bitrix\Data\CrmContact\BitrixCrmContactMultipleField;
use App\Services\Bitrix\Models\BitrixContactUserFieldsValues;
use App\Services\Bitrix\Models\BitrixCrmContact;
use App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus;
use Carbon\Carbon;
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


class BitrixUserAttributesData extends Data
{
    public function __construct(

        public ?int $user_id,

        #[MapInputName('ID')]
        public ?int $bx_id,

        #[Nullable]
        #[MapInputName('NAME')]
        #[MapName('name')]
        public null|string|Optional $name,

        #[Nullable]
        #[MapInputName('SECOND_NAME')]
        public null|string|Optional $surname,

        #[Nullable]
        #[MapInputName('LAST_NAME')]
        public null|string|Optional $last_name,

        #[Nullable]
        #[MapInputName('UF_CRM_1684417556589')]
        #[WithCast(DateTimeCast::class)]
        public null|string|\DateTime|Optional $bod,

        #[MapInputName('UF_CRM_1684451624855')]
        public ?string $instagram,

        #[MapInputName('UF_CRM_1684451635562')]
        public ?string $telegram,

        #[MapInputName('UF_CRM_1684451653540')]
        public ?string $vk,

        #[MapInputName('UF_CRM_1684451663987')]
        public ?string $facebook,

        #[MapInputName('UF_CRM_1684451316621')]
        public null|string|Optional $city,

        #[Nullable]
        #[MapInputName('UF_CRM_1684490786750')]
        public null|string|int|Optional $bonus,


        #[Nullable]
        #[MapInputName('PHONE')]
        #[WithCast(PhoneCast::class)]
        public ?string $phone,


        #[Nullable]
        #[MapInputName('IM')]
        #[DataCollectionOf(BitrixCrmContactMultipleField::class)]
        public null|DataCollection|Optional $im,


        #[Nullable]
        #[MapInputName('UF_CRM_1684410059010')]
        #[WithCast(GenderIdCast::class)]
        public null|int|Optional $gender_id,

        #[Nullable]
        #[MapInputName('UF_CRM_1684752635835')]
        #[MapOutputName('UF_CRM_1684752635835')]
        public null|string|Optional $tenant_description,

        #[Nullable]
        #[MapInputName('UF_CRM_1684495656874')]
        #[MapOutputName('UF_CRM_1684495656874')]
        public null|string|Optional $landlord_description,


        #[Nullable]
        #[MapInputName('UF_CRM_1685441642365')]
        #[MapOutputName('UF_CRM_1685441642365')]
        public null|string|bool|Optional $email_confirmed,


    ) {
        self::getIm();
    }

    public function getIm(){
        if (!empty($this->im) && is_object($this->im)){
            foreach ($this->im as $im){
                switch ($im->value_type){
                    case "INSTAGRAM":
                        $this->instagram = $im->value;
                        break;
                    case "FACEBOOK":
                        $this->facebook = $im->value;
                        break;
                    case "TELEGRAM":
                        $this->telegram = $im->value;
                        break;
                    case "VK":
                        $this->vk = $im->value;
                        break;
                }
            }
        }

    }


}
