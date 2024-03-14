<?php

namespace App\Services\Bitrix\Enum;

use JetBrains\PhpStorm\ArrayShape;

final class UnitSettingsEnum
{
    public static function FIELDS()
    {
        return [
            'name'         => [
                "name" => 'title',
                "type"     => false,
                "getField" => false
            ],
            'status'       => [
                "name"     => 'stageId',
                "type"     => "stageUnit",
                "getField" => "name"
            ],
            'counterparty' => [
                "name"     => 'contactId',
                "type"     => "contact",
                "getField" => 'term_id'
            ],
            'parent' => [
                "name"     => 'parentId156',
                "type"     => "apartment",
                "getField" => 'id'
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
            '❗️ Оперативная информация'   => [
                "name"     => "ufCrm8_1686051468547",
                "type"     => false,
                "getField" => 'stringValue'
            ],
            'Число оплаты'                    => [
                "name"     => "ufCrm8_1684502485132",
                "type"     => false,
                "getField" => 'stringValue'
            ],
            'Бумажный договор в архиве'       => [
                "name"     => "ufCrm8_1684502879060",
                "type"     => "boolean",
                "getField" => 'stringValue'
            ],
            'Долг по аренде' => [
                "name"     => "ufCrm8_1684503267567",
                "type"     => false,
                "getField" => 'stringValue'
            ],
            '💰 Депозит получено'                    => [
                "name"     => "ufCrm8_1684506147708",
                "type"     => "int",
                "getField" => 'stringValue'
            ],
            'Стоимость Простоя'      => [
                "name"     => "ufCrm8_1684504562176",
                "type"     => false,
                "getField" => 'stringValue'
            ],
            'Необходима индексация'      => [
                "name"     => "ufCrm8_1684503146860",
                "type"     => false,
                "getField" => 'stringValue'
            ],
            'Дата начала Программы Лояльности'      => [
                "name"     => "ufCrm8_1684504178059",
                "type"     => false,
                "getField" => 'stringValue'
            ],

            '➕ Баллы жильца'      => [
                "name"     => "ufCrm8_1684503004264",
                "type"     => false,
                "getField" => 'stringValue'
            ],

            'Сообщили о индексации'      => [
                "name"     => "ufCrm8_1684503157577",
                "type"     => "boolean",
                "getField" => 'stringValue'
            ],

            'Стоимость аренды целевая'      => [
                "name"     => "ufCrm8_1684501941954",
                "type"     => "boolean",
                "getField" => 'stringValue'
            ],

            'Аренда оплачена'      => [
                "name"     => "ufCrm8_1684501225374",
                "type"     => "boolean",
                "getField" => 'stringValue'
            ],

            'Простой'      => [
                "name"     => "ufCrm8_1684504030516",
                "type"     => false,
                "getField" => 'stringValue'
            ],

            'Сводное описание жильца'      => [
                "name"     => "ufCrm8_1684503743898",
                "type"     => false,
                "getField" => 'stringValue'
            ],

            'Наличие брони'      => [
                "name"     => "ufCrm8_1684504128857",
                "type"     => "boolean",
                "getField" => 'stringValue'
            ],

            'Дата выселения'      => [
                "name"     => "ufCrm8_1684502745013",
                "type"     => "date",
                "getField" => 'stringValue'
            ],


            'Дата оплаты'      => [
                "name"     => "ufCrm8_1684502656228",
                "type"     => "date",
                "getField" => 'stringValue'
            ],

            'Стоимость КУ'      => [
                "name"     => "ufCrm8_1684502424150",
                "type"     => false,
                "getField" => 'value'
            ],

            '? Депозит по договору'      => [
                "name"     => "ufCrm8_1684502642872",
                "type"     => false,
                "getField" => 'value'
            ],

            'Дата окончания договора'      => [
                "name"     => "ufCrm8_1684502712523",
                "type"     => "date",
                "getField" => 'stringValue'
            ],

            'Способ оплаты жильца'      => [
                "name"     => "ufCrm8_1684503831143",
                "type"     => "tenantPayment",
                "getField" => 'stringValue'
            ],

            'Период проживания, дни.'      => [
                "name"     => "ufCrm8_1684504286354",
                "type"     => false,
                "getField" => 'stringValue'
            ],

            '? Долг по депозиту'      => [
                "name"     => "ufCrm8_1684503238944",
                "type"     => false,
                "getField" => 'stringValue'
            ],

            'Сумма индексации'      => [
                "name"     => "ufCrm8_1684505871997",
                "type"     => "int",
                "getField" => 'value'
            ],

            'Ссылка на Архив'      => [
                "name"     => "ufCrm8_1684505929651",
                "type"     => false,
                "getField" => 'stringValue'
            ],


            'Дата сообщения о выселении/релиза'      => [
                "name"     => "ufCrm8_1684506304803",
                "type"     => "date",
                "getField" => 'stringValue'
            ],

            'Причина выселения'      => [
                "name"     => "ufCrm8_1684502796578",
                "type"     => "reasonEviction",
                "getField" => 'stringValue'
            ],

            'Причины выселения (комментарий)'      => [
                "name"     => "ufCrm8_1684502819283",
                "type"     => false,
                "getField" => 'stringValue'
            ],

            'Использовано баллов'      => [
                "name"     => "ufCrm8_1684503053923",
                "type"     => "int",
                "getField" => 'stringValue'
            ],

            'Дата обратной связи'      => [
                "name"     => "ufCrm8_1684504194384",
                "type"     => "date",
                "getField" => 'stringValue'
            ],

            'Дата последнего использования Баллов Лояльности'      => [
                "name"     => "ufCrm8_1684503069555",
                "type"     => "date",
                "getField" => 'stringValue'
            ],

            'Регистрация простоя комнаты'      => [
                "name"     => "ufCrm8_1684504409837",
                "type"     => "date",
                "getField" => 'stringValue'
            ],

            'Дней просрочки'      => [
                "name"     => "ufCrm8_1684504470918",
                "type"     => "int",
                "getField" => 'stringValue'
            ],

            'Причина задолженности'      => [
                "name"     => "ufCrm8_1684504609697",
                "type"     => "debtReason",
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
