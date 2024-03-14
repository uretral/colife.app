<?php

namespace App\Services\Bitrix\Data\CrmContact;


use App\Services\Bitrix\Data\Castables\DateTimeCast;
use App\Services\Bitrix\Data\Castables\GenderIdCast;
use App\Services\Bitrix\Data\Castables\SourceIdCast;
use App\Services\Bitrix\Data\Castables\TypeIdCast;
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


class BitrixCrmContactData extends Data
{
    public function __construct(
        #[Nullable]
        #[MapInputName('ID')]
        #[MapOutputName('ID')]
        public null|int|Optional $bx_id,

        #[Nullable]
        #[MapInputName('NAME')]
        #[MapName('name')]
        #[MapOutputName('NAME')]
        public null|string|Optional $name,

        #[Nullable]
        #[MapInputName('SECOND_NAME')]
        #[MapOutputName('SECOND_NAME')]
        public null|string|Optional $second_name,

        #[Nullable]
        #[MapInputName('LAST_NAME')]
        #[MapOutputName('LAST_NAME')]
        public null|string|Optional $last_name,

        #[Nullable]
        #[MapInputName('TYPE_ID')]
        #[MapOutputName('TYPE_ID')]
        #[WithCast(TypeIdCast::class)]
        public null|string|int|Optional $type_id,

        #[Nullable]
        #[MapInputName('SOURCE_ID')]
        #[MapOutputName('SOURCE_ID')]
        #[WithCast(SourceIdCast::class)]
        public null|string|int|Optional $source_id,

        #[Nullable]
        #[MapInputName('UF_CRM_1684417572510')]
        #[MapOutputName('UF_CRM_1684417572510')]
        public null|string|float|Optional $age,

        #[Nullable]
        #[MapInputName('UF_CRM_1684417556589')]
        #[MapOutputName('UF_CRM_1684417556589')]
        #[WithCast(DateTimeCast::class)]
        public null|string|\DateTime|Optional $birth_date,

        #[Nullable]
        #[MapInputName('UF_CRM_1684451624855')]
        #[MapOutputName('UF_CRM_1684451624855')]
        public null|string|Optional $instagram,

        #[Nullable]
        #[MapInputName('UF_CRM_1684451635562')]
        #[MapOutputName('UF_CRM_1684451635562')]
        public null|string|Optional $telegram,

        #[Nullable]
        #[MapInputName('UF_CRM_1684451646571')]
        #[MapOutputName('UF_CRM_1684451646571')]
        public null|string|Optional $tiktok,

        #[Nullable]
        #[MapInputName('UF_CRM_1684451653540')]
        #[MapOutputName('UF_CRM_1684451653540')]
        public null|string|Optional $vk,

        #[Nullable]
        #[MapInputName('UF_CRM_1684451663987')]
        #[MapOutputName('UF_CRM_1684451663987')]
        public null|string|Optional $facebook,

        #[Nullable]
        #[MapInputName('UF_CRM_1684451316621')]
        #[MapOutputName('UF_CRM_1684451316621')]
        public null|string|Optional $city,

        #[Nullable]
        #[MapInputName('UF_CRM_1684417596161')]
        #[MapOutputName('UF_CRM_1684417596161')]
        public null|string|Optional $passport_num,

        #[Nullable]
        #[MapInputName('UF_CRM_1684417781613')]
        #[MapOutputName('UF_CRM_1684417781613')]
        public null|string|Optional $passport_issued,

        #[Nullable]
        #[MapInputName('UF_CRM_1684490759068')]
        #[MapOutputName('UF_CRM_1684490759068')]
        public string|null|int|Optional $rental_price,

        #[Nullable]
        #[MapInputName('UF_CRM_1684490786750')]
        #[MapOutputName('UF_CRM_1684490786750')]
        public null|string|int|Optional $max_points_payment,

        #[Nullable]
        #[MapInputName('UF_CRM_1684488674289')]
        #[MapOutputName('UF_CRM_1684488674289')]
        public null|string|bool|Optional $lk_registered,

        #[Nullable]
        #[MapInputName('PHONE')]
        #[MapOutputName('PHONE')]
        #[DataCollectionOf(BitrixCrmContactMultipleField::class)]
        public null|DataCollection|Optional $phone,

        #[Nullable]
        #[MapInputName('EMAIL')]
        #[MapOutputName('EMAIL')]
        #[DataCollectionOf(BitrixCrmContactMultipleField::class)]
        public null|DataCollection|Optional $email,

        #[Nullable]
        #[MapInputName('IM')]
        #[MapOutputName('IM')]
        #[DataCollectionOf(BitrixCrmContactMultipleField::class)]
        public ?DataCollection $im,


        #[Nullable]
        #[MapInputName('UF_CRM_1684410059010')]
        #[MapOutputName('UF_CRM_1684410059010')]
        #[WithCast(GenderIdCast::class)]
        public ?string $gender_id,

        #[Nullable]
        #[MapInputName('UF_CRM_1684752635835')]
        #[MapOutputName('UF_CRM_1684752635835')]
        public ?string $tenant_description,

        #[Nullable]
        #[MapInputName('UF_CRM_1684495656874')]
        #[MapOutputName('UF_CRM_1684495656874')]
        public ?string $landlord_description,

        #[Nullable]
        #[MapInputName('GROUP_ID')]
        #[MapOutputName('UF_CRM_1111111111111')]
        public ?string $group_id,

        #[Nullable]
        #[MapInputName('UF_CRM_1685441775445')]
        #[MapOutputName('UF_CRM_1685441775445')]
        public null|string|Optional $auth_url,

        #[Nullable]
        #[MapInputName('UF_CRM_1685441642365')]
        #[MapOutputName('UF_CRM_1685441642365')]
        public ?string $email_confirmed,


    ) {
        self::getIm();
    }

    public static function fromModel(BitrixCrmContact $model): self
    {
        // Test Вынести SingleResponsibility?
        $type_id = BitrixCrmStatusEntityStatus::find($model->type_id)?->status ?? null;
        $source_id = BitrixCrmStatusEntityStatus::find($model->source_id)?->status  ?? null;
        $phone = BitrixCrmContactMultipleField::collection($model->phone) ?? null;
        $email = BitrixCrmContactMultipleField::collection($model->email) ?? null;
        $gender_id = BitrixContactUserFieldsValues::find($model->gender_id)?->bx_id ?? null;

        return new self(
            $model->bx_id,
            $model->name,
            $model->second_name,
            $model->last_name,
            $type_id,
            $source_id,
            $model->age,
            Carbon::parse($model->birth_date),
            $model->instagram,
            $model->telegram,
            $model->tiktok,
            $model->vk,
            $model->facebook,
            $model->city,
            $model->passport_num,
            $model->passport_issued,
            $model->rental_price,
            $model->max_points_payment,
            (bool)$model->lk_registered,
            $phone,
            $email,
            null,
            $gender_id,
            $model->tenant_description,
            $model->landlord_description,
            $model->group_id,
            $model->auth_url,
            $model->email_confirmed,
        );
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
