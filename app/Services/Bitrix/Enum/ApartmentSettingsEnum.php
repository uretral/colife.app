<?php

namespace App\Services\Bitrix\Enum;

use JetBrains\PhpStorm\ArrayShape;

final class ApartmentSettingsEnum
{
    #[ArrayShape(['name' => "string[]", 'status' => "string[]", 'counterparty' => "string[]"])]

    public static function FIELDS()
    {
        return [
            'name'         => [
                "name" => 'title'
            ],
            'status'       => [
                "name"     => 'stageId',
                "type"     => "stage",
                "getField" => "name"
            ],
            'counterparty' => [
                "name"     => 'contactId',
                "type"     => "contact",
                "getField" => 'term_id'
            ],
        ];
    }

    public static function CUSTOM_FIELDS(): array
    {
        return [
            'Стоимость аренды по договору'   => [
                "name"     => "opportunity",
                "type"     => false,
                "getField" => 'stringValue'
            ],
            'Сумм. стоимость аренды целевая' => [
                "name"     => "ufCrm6_1684149695051",
                "type"     => false,
                "getField" => 'stringValue'
            ],
            'Дата оплаты'                    => [
                "name"     => "ufCrm6_1684149840525",
                "type"     => "date",
                "getField" => 'stringValue'
            ],
            '❗️ Оперативная информация'      => [
                "name"     => "ufCrm6_1684155496987",
                "type"     => false,
                "getField" => 'stringValue'
            ],


            '?Кол-во спальных мест' => [
                "name"     => "ufCrm6_1684158616401",
                "type"     => false,
                "getField" => 'stringValue'
            ],

            'Число оплаты'                    => [
                "name"     => "ufCrm6_1684155582235",
                "type"     => false,
                "getField" => 'stringValue'
            ],
            'Самозанятый/ ИП / Физ'           => [
                "name"     => "ufCrm6_1684156233398",
                "type"     => "employ",
                "getField" => 'stringValue'
            ],
            'Способ оплаты КУ'                => [
                "name"     => "ufCrm6_1684156778577",
                "type"     => "services",
                "getField" => 'stringValue'
            ],
            'Всего ключей для этой квариты'   => [
                "name"     => "ufCrm6_1684158697716",
                "type"     => false,
                "getField" => 'stringValue'
            ],
            'Задолженность по оплате КУ'      => [
                "name"     => "ufCrm6_1684157041906",
                "type"     => "debt",
                "getField" => 'value'
            ],
            'Оплачено'                        => [
                "name"     => "ufCrm6_1684157251722",
                "type"     => "boolean",
                "getField" => 'stringValue'
            ],
            'Бумажный договор в архиве'       => [
                "name"     => "ufCrm6_1684157696937",
                "type"     => "boolean",
                "getField" => 'stringValue'
            ],
            'Контактное лицо собственника'    => [
                "name"     => "ufCrm6_1684158211032",
                "type"     => false,
                "getField" => 'stringValue'
            ],
            'Ответственный менеджер'          => [
                "name"     => "ufCrm6_1684158225",
                "type"     => "manager",
                "getField" => 'stringValue'
            ],
            'В КВ Электронные замки'          => [
                "name"     => "ufCrm6_1684506865428",
                "type"     => false,
                "getField" => 'stringValue'
            ],
            'Объект (квартира)'               => [
                "name"     => "ufCrm6_1684506865428",
                "type"     => "apartment",
                "getField" => 'stringValue'
            ],
            'Дата окончания арендных каникул' => [
                "name"     => "ufCrm6_1684158469165",
                "type"     => "date",
                "getField" => 'stringValue'
            ],
        ];
    }


    public static function FLAT_FIELDS(): array
    {
        return [
            'Этаж'                                           => [
                "name"     => "ufCrm6_1684150872254",
                "type"     => false,
                "getField" => 'value'
            ],
            'Адрес, код домофона, подъезд, этаж, как пройти' => [
                "name"     => "ufCrm6_1684150726574",
                "type"     => false,
                "getField" => 'value'
            ],
            'Площадь квартиры (общая), кв.м.'                => [
                "name"     => "ufCrm6_1684150784465",
                "type"     => false,
                "getField" => 'value'
            ],
            'Площадь квартиры (жилая), кв.м.'                => [
                "name"     => "ufCrm6_1684150803587",
                "type"     => false,
                "getField" => 'value'
            ],
            'Удобства в квартире'                            => [
                "name"     => "ufCrm6_1684150896149",
                "type"     => false,
                "getField" => 'value'
            ],
            'Инфраструктура'                                 => [
                "name"     => "ufCrm6_1684150916765",
                "type"     => false,
                "getField" => 'value'
            ],
            'Станция метро'                                  => [
                "name"     => "ufCrm6_1684150958165",
                "type"     => "metro",
                "getField" => 'value'
            ],
            'Расстояние до ближайшего метро'                 => [
                "name"     => "ufCrm6_1684150986795",
                "type"     => false,
                "getField" => 'value'
            ],
            'Транспорт'                                      => [
                "name"     => "ufCrm6_1684159180784",
                "type"     => false,
                "getField" => 'value'
            ],
            'Преимущества'                                   => [
                "name"     => "ufCrm6_1684151031703",
                "type"     => false,
                "getField" => 'value'
            ],
            'Описание квартиры'                              => [
                "name"     => "ufCrm6_1684155422296",
                "type"     => false,
                "getField" => 'value'
            ],
            'Ссылка на фотографии'                           => [
                "name"     => "ufCrm6_1684159240827",
                "type"     => false,
                "getField" => 'value'
            ],
            'Документы на квартиру'                          => [
                "name"     => "ufCrm6_1684183518945",
                "type"     => false,
                "getField" => 'value'
            ],
            'Кол-во комнат'                                  => [
                "name"     => "ufCrm6_1684150840493",
                "type"     => false,
                "getField" => 'value'
            ],
            'Дата начала аренды'                             => [
                "name"     => "ufCrm6_1684149880724",
                "type"     => "date",
                "getField" => 'value.date'
            ],
            'Местоположение'                                 => [
                "name"     => "ufCrm6_1684150616352",
                "type"     => "address",
                "getField" => 'value'
            ],
        ];
    }


}
