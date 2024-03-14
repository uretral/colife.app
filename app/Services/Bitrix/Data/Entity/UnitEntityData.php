<?php

namespace App\Services\Bitrix\Data\Entity;


use App\Services\Bitrix\Data\Castables\GenderIdCast;
use App\Services\Bitrix\Data\Castables\SourceIdCast;
use App\Services\Bitrix\Data\Castables\TypeIdCast;
use App\Services\Bitrix\Data\CrmContact\BitrixCrmContactData;
use App\Services\Bitrix\Data\CrmStatus\BitrixCrmStatusEntityStatusData;
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


class UnitEntityData extends Data
{
    public function __construct(
        #[Nullable, IntegerType]
        #[MapInputName('id')]
        public null|int|Optional $bx_id,

        #[Nullable,StringType]
        public null|string|Optional $title,

        #[Nullable,StringType]
        public null|string|Optional $stageId,

        // Цена аренды по договору
        #[Nullable,IntegerType]
        #[MapInputName('opportunity')]
        #[MapOutputName('opportunity')]
        public null|int|Optional $opportunity,

        // Цена аренды целевая
        #[Nullable,StringType]
        #[MapInputName('ufCrm6_1684149695051')]
        #[MapOutputName('ufCrm6_1684149695051')]
        public null|string|Optional $payment_price,

        // Дата начала аренды
        #[Nullable,StringType]
        #[MapInputName('ufCrm6_1684149880724')]
        #[MapOutputName('ufCrm6_1684149880724')]
        public null|string|Optional $rent_at,

        // Дата оплаты
        #[Nullable,StringType]
        #[MapInputName('ufCrm6_1684149840525')]
        #[MapOutputName('ufCrm6_1684149840525')]
        public null|string|Optional $payment_date,

        // ! Оперативная информация
        #[Nullable]
        #[MapInputName('ufCrm6_1684155496987')]
        #[MapOutputName('ufCrm6_1684155496987')]
        public null|string|Optional $operational_info,

        // Адрес
        #[Nullable,StringType]
        #[MapInputName('ufCrm6_1684150616352')]
        #[MapOutputName('ufCrm6_1684150616352')]
        public null|string|Optional $address,

        // Подъезд, этаж, квартира, как пройти
        #[Nullable,StringType]
        #[MapInputName('ufCrm6_1684150726574')]
        #[MapOutputName('ufCrm6_1684150726574')]
        public null|string|Optional $how_to_find,

        // Площадь квартиры общая (кв.м.)
        #[Nullable,StringType]
        #[MapInputName('ufCrm6_1684150784465')]
        #[MapOutputName('ufCrm6_1684150784465')]
        public null|float|Optional $area_full,

        // Кол-во комнат
        #[Nullable]
        #[MapInputName('ufCrm6_1684150840493')]
        #[MapOutputName('ufCrm6_1684150840493')]
        public null|float|Optional $units_total,

        // Кол-во спальных мест
        #[Nullable]
        #[MapInputName('ufCrm6_1684158616401')]
        #[MapOutputName('ufCrm6_1684158616401')]
        public null|float|Optional $places,

        // Этаж
        #[Nullable]
        #[MapInputName('ufCrm6_1684150872254')]
        #[MapOutputName('ufCrm6_1684150872254')]
        public null|int|Optional $floor,


        // Удобства в квартире
        #[Nullable]
        #[MapInputName('ufCrm6_1684150896149')]
        #[MapOutputName('ufCrm6_1684150896149')]
        public null|string|Optional $comfort_units,

        // Инфраструктура
        #[Nullable]
        #[MapInputName('ufCrm6_1684150916765')]
        #[MapOutputName('ufCrm6_1684150916765')]
        public null|string|Optional $infrastructure,

        // Станция метро
        #[Nullable]
        #[MapInputName('ufCrm6_1684150958165')]
        #[MapOutputName('ufCrm6_1684150958165')]
        public null|string|Optional $metro_station,

        // Расстояние до ближайшего метро, мин
        #[Nullable]
        #[MapInputName('ufCrm6_1684150986795')]
        #[MapOutputName('ufCrm6_1684150986795')]
        public null|string|Optional $metro_station_at,

        // Ближайший транспорт
        #[Nullable]
        #[MapInputName('ufCrm6_1684159180784')]
        #[MapOutputName('ufCrm6_1684159180784')]
        public null|string|Optional $transport_desc,

        // Преимущества
        #[Nullable]
        #[MapInputName('ufCrm6_1684151031703')]
        #[MapOutputName('ufCrm6_1684151031703')]
        public null|string|Optional $advantages,

        // Описание квартиры
        #[Nullable]
        #[MapInputName('ufCrm6_1684155422296')]
        #[MapOutputName('ufCrm6_1684155422296')]
        public null|string|Optional $apartment_descr,

        // Все обязательные поля заполнены
        #[Nullable]
        #[MapInputName('ufCrm6_1684155457929')]
        #[MapOutputName('ufCrm6_1684155457929')]
        public null|bool|Optional $filled_required,

        // Кол-во ключей
        #[Nullable]
        #[MapInputName('ufCrm6_1684158697716')]
        #[MapOutputName('ufCrm6_1684158697716')]
        public null|int|Optional $keys_num,

        // Ссылка на фотографии
        #[Nullable]
        #[MapInputName('ufCrm6_1684159240827')]
        #[MapOutputName('ufCrm6_1684159240827')]
        public null|string|Optional $photo_link,

        // Ссылка на документы
        #[Nullable]
        #[MapInputName('ufCrm6_1684183518945')]
        #[MapOutputName('ufCrm6_1684183518945')]
        public null|string|Optional $docs_link,

        // Число оплаты
        #[Nullable]
        #[MapInputName('ufCrm6_1684155582235')]
        #[MapOutputName('ufCrm6_1684155582235')]
        public null|float|Optional $payment_day,

        // Самозанятый/ ИП/ Физ
        #[Nullable]
        #[MapInputName('ufCrm6_1684156233398')]
        #[MapOutputName('ufCrm6_1684156233398')]
        public null|int|Optional $payment_type,

        // Способ оплаты КУ
        #[Nullable]
        #[MapInputName('ufCrm6_1684156778577')]
        #[MapOutputName('ufCrm6_1684156778577')]
        public null|float|Optional $payment_method,

        // Задолженность по оплате КУ
        #[Nullable]
        #[MapInputName('ufCrm6_1684157041906')]
        #[MapOutputName('ufCrm6_1684157041906')]
        public null|array|Optional $payment_debd,

        // Оплачено
        #[Nullable]
        #[MapInputName('ufCrm6_1684157251722')]
        #[MapOutputName('ufCrm6_1684157251722')]
        public null|string|Optional $is_paid,

        // Бумажный договор в архиве
        #[Nullable]
        #[MapInputName('ufCrm6_1684157696937')]
        #[MapOutputName('ufCrm6_1684157696937')]
        public null|string|Optional $contract_archived,

        // Дата окончания арендных каникул
        #[Nullable]
        #[MapInputName('ufCrm6_1684158469165')]
        #[MapOutputName('ufCrm6_1684158469165')]
        public null|string|Optional $holiday_at,

        // Дата расторжения договора
        #[Nullable]
        #[MapInputName('ufCrm6_1684158489789')]
        #[MapOutputName('ufCrm6_1684158489789')]
        public null|string|Optional $contract_at,

        // Контакт
        #[Nullable]
        #[MapInputName('contactId')]
        #[MapOutputName('contactId')]
        public null|int|Optional $contact_id,

        // Контактное лицо собственника
        #[Nullable]
        #[MapInputName('ufCrm6_1684158211032')]
        #[MapOutputName('ufCrm6_1684158211032')]
        public null|string|Optional $landlord_contact,

        // Ответственный
        #[Nullable]
        #[MapInputName('ufCrm6_1684158225')]
        #[MapOutputName('ufCrm6_1684158225')]
        public null|int|Optional $assigned_user,

        // Электронные замки
        #[Nullable]
        #[MapInputName('ufCrm6_1684920133373')]
        #[MapOutputName('ufCrm6_1684920133373')]
        public null|string|Optional $landlord_id,

        // Валюта
        #[Nullable]
        public null|string $currencyId = 'RUB',
    ) {
    }

    private static function getFieldValue($field){

        if ($field['type'] == 'boolean'){
            return !empty($field['pivot']['value']) ? "Y" : "N";
        }

    }

    public static function fromData($bx_id, $payloads): static
    {

        foreach ($payloads as $field){

           $data[$field['bx_name']] = match ($field['bx_name']){
               'title' => $field['pivot']['value'],
               'stageId' => $field['pivot']['value'],
               'opportunity' => $field['pivot']['value'],
               'ufCrm6_1684149695051' => $field['pivot']['value'],
               'ufCrm6_1684149880724' => $field['pivot']['value'],
               'ufCrm6_1684149840525' => $field['pivot']['value'],
               'ufCrm6_1684150616352' => $field['pivot']['value'],
               'ufCrm6_1684150726574' => $field['pivot']['value'],
               'ufCrm6_1684150784465' => $field['pivot']['value'],
               'ufCrm6_1684150840493' => $field['pivot']['value'],
               'ufCrm6_1684158616401' => $field['pivot']['value'],
               'ufCrm6_1684150872254' => $field['pivot']['value'],
               'ufCrm6_1684150896149' => $field['pivot']['value'],
               'ufCrm6_1684150916765' => $field['pivot']['value'],
               'ufCrm6_1684150958165' => $field['pivot']['value'],
               'ufCrm6_1684150986795' => $field['pivot']['value'],
               'ufCrm6_1684159180784' => $field['pivot']['value'],
               'ufCrm6_1684151031703' => $field['pivot']['value'],
               'ufCrm6_1684155422296' => $field['pivot']['value'],
               'ufCrm6_1684155496987' => $field['pivot']['value'],
               'ufCrm6_1684155457929' => $field['pivot']['value'],
               'ufCrm6_1684158697716' => $field['pivot']['value'],
               'ufCrm6_1684159240827' => $field['pivot']['value'],
               'ufCrm6_1684183518945' => $field['pivot']['value'],
               'ufCrm6_1684155582235' => $field['pivot']['value'],
               'ufCrm6_1684156233398' => $field['pivot']['value'],
               'ufCrm6_1684156778577' => $field['pivot']['value'],
               'ufCrm6_1684157041906' => $field['pivot']['value'],
               'ufCrm6_1684157251722' => self::getFieldValue($field),
               'ufCrm6_1684157696937' => self::getFieldValue($field),
               'ufCrm6_1684158469165' => $field['pivot']['value'],
               'ufCrm6_1684158489789' => $field['pivot']['value'],
               'contactId' => $field['pivot']['value'],
               'ufCrm6_1684158211032' => $field['pivot']['value'],
               'ufCrm6_1684158225' => $field['pivot']['value'],
               'ufCrm6_1684920133373' => self::getFieldValue($field),
               'currencyId' => $field['pivot']['value'] ?? 'RUB',
               default => null
           };
        }
        $data['id'] = $bx_id;


        return self::from($data);
    }

}
