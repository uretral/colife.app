<?php

namespace App\Services\Bitrix\Helpers;

use App\Services\Bitrix\Data\Apartment\BitrixApartmentChatData;
use App\Services\Bitrix\Data\Chats\BitrixSendMessageData;
use App\Services\Bitrix\Data\Chats\BitrixTenantChatData;
use App\Services\Bitrix\Enum\BitrixWebhookEventEnum;
use App\Services\Bitrix\Enum\TypeIdEnum;
use App\Services\Bitrix\Enum\UnitStatusEnum;
use App\Services\Bitrix\Models\BitrixCrmContact;
use App\Services\Bitrix\Models\BitrixCrmItem;
use App\Services\Bitrix\Models\BitrixCrmTypeFields;
use App\Services\Bitrix\Models\BitrixUserField;
use App\Services\Bitrix\Stubs\MetroStations;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class BitrixHelper
{
    /**
     * Рекурсивная коллекция
     * @param $array
     * @return Collection
     */
    public static function r_collect($array): Collection
    {
        try {
            foreach ($array as $key => $value) {
                if (is_array($value)) {
                    $value = self::r_collect($value);
                    $array[$key] = $value;
                }
            }

            return collect($array);
        } catch (\Exception $e) {
            $message = 'Ошибка создания рекурсивной коллекции';
            Log::error($message . ' ' . $e->getMessage());
            throw new \Exception($message);
        }
    }


    /**
     * @param int $groupId
     * @return TypeIdEnum
     */
    public static function getTypeByGroupId(int $groupId): TypeIdEnum
    {
        switch ($groupId) {
            case 12362:
                return TypeIdEnum::UC_NEAM89();
            case 11904:
                return TypeIdEnum::CLIENT();
            case 11902:
            case 12368:
            case 12376:
                return TypeIdEnum::LANDLORD();
            case 12370:
                return TypeIdEnum::UC_MDVH8X();
            case 12366:
            case 186750:
                return TypeIdEnum::SUPPLIER();
            default:
                return TypeIdEnum::OTHER();
        }
    }

    public static function getMoscowMetroStations(): Collection
    {
        return MetroStations::get();
    }


    /**
     * Генерируем идентификатор поля для Битрикс
     * @param string $entityId
     * @return string
     */
    public static function genFieldName(string $entityId): string
    {
        // UF_ + {идентификатор сущности} + _ + {произвольная строка в UPPER_CASE}
        return "UF_{$entityId}" . Str::random();
    }

    public static function getModelByEntity(string $groupId): string
    {
        return match ($groupId) {
            // Дефолтное значение для пустых сущностей
            'CRM_LEAD', 'CRM_COMPANY', 'CRM_DEAL', 'CRM_QUOTE', 'CRM_INVOICE' => 'App\Services\Bitrix\Models\BitrixCrmTypeFields',
            'CRM_CONTACT' => 'App\Services\Bitrix\Models\BitrixCrmContact',
            default => 'App\Services\Bitrix\Models\BitrixCrmTypeFields',
        };
    }

    /**
     * Типы вебхуков и их группировка
     * @param string $event
     * @return string
     */
    public static function getWebhookAction(string $event): string
    {
        return match ($event) {
            BitrixWebhookEventEnum::CONTACT_CREATED()->value,
            BitrixWebhookEventEnum::CONTACT_UPDATED()->value,
            BitrixWebhookEventEnum::CONTACT_DELETED()->value
            => 'CONTACT',

            BitrixWebhookEventEnum::ITEM_CREATED()->value,
            BitrixWebhookEventEnum::ITEM_UPDATED()->value,
            BitrixWebhookEventEnum::ITEM_DELETED()->value
            => 'ITEM',

            default => false
        };
    }

    public static function encodedAuthUrl(string $email, int $bx_id, string $name): string
    {
        $encode = [
            "email"     => $email,
            "contactId" => $bx_id,
            "name"      => $name,
        ];

        $password = config('bitrix24.ENCRYPTION_KEY');
        $algo = config('bitrix24.ENCRYPTION_ALGO');
        return urlencode(openssl_encrypt(json_encode($encode), $algo, $password));
    }

    public static function decodeAuthUrl(string $encodedString): ?object
    {
        $password = config('bitrix24.ENCRYPTION_KEY');
        $algo = config('bitrix24.ENCRYPTION_ALGO');
        return json_decode(openssl_decrypt(urldecode($encodedString), $algo, $password));
    }

    public static function findMetroIdByPlanfix($string, $bxMetroId = 240)
    {
        if (empty($string)) {
            return null;
        }

        if (Str::contains($string, " (")) {
            $value = explode(" (", $string)[0];
        } else {
            $value = $string;
        }

        $value = Str::ucfirst($value);

        return BitrixUserField::whereBxId($bxMetroId)
            ->first()
            ->values()
            ->where("value", "like", "%{$value}%")
            ->first()
            ?->bx_id;
    }

    public static function findEmployIdByPlanfix($value, $bxEmployId = 254): int
    {
        $value = Str::replace("Физ лицо", "Физ", $value);
        $value = Str::replace("ИП / ООО", "ИП", $value);
        $value = Str::replace("На ИП", "ИП", $value);

        return BitrixUserField::whereBxId($bxEmployId)
            ->first()
            ->values()
            ->where("value", $value)
            ->first()
            ?->bx_id;
    }


    /**
     * Временное решение для переноса, hardcoded
     * @param $value
     * @param int $bxServicePayment
     * @return int
     */
    public static function findServicePaymentTypeIdByPlanfix($value, $bxServicePayment = 256): int
    {
        $values = BitrixUserField::whereBxId($bxServicePayment)
            ->first()
            ->values();

        if (Str::contains($value, "Собственник")) {
            return $values->where("value", "Платим собственник")->first()->bx_id;
        } else {
            return $values->where("value", "Платим мы")->first()->bx_id;
        }
    }

    public static function getBitrixStageByPlanfix($value): string
    {
        return match ($value) {
            'В работе', 'СДАТЬ' => 'DT156_10:PREPARATION',
            'Сдана' => 'DT156_10:CLIENT',
            'Планирует выезжать', 'Выехал' => 'DT156_10:UC_NFC54X',
            'Завершенная' => 'DT156_10:SUCCESS',
            default => 'DT156_10:NEW'
        };
    }

    public static function getBitrixStageUnitByPlanfix($value): string
    {
        return match ($value) {
            'В работе', 'СДАТЬ' => 'DT171_12:PREPARATION',
            'Сдана' => 'DT171_12:CLIENT',
            'Планирует выезжать', 'Выехал' => 'DT171_12:UC_QGIB2X',
            'Завершенная' => 'DT171_12:SUCCESS',
            default => 'DT171_12:NEW'
        };
    }

    public static function getEnumByBxId(int $bx_id, $fn = "mb_strtoupper")
    {
        $field = BitrixUserField::whereBxId($bx_id)->first();
        return $field->values->map(
            function ($item, $key) use ($fn) {
                if (!empty($fn) && $item->value) {
                    $item->value = $fn($item->value);
                }
                return $item;
            }
        );
    }

    public static function getDealIdFromDialog(array $payload, $param = 'entity_data_2'): ?int
    {

        if(preg_match('/DEAL\|(.*?)$/', $payload[$param], $match) != 1)
            throw new \Exception('Ошибка парсинга сделки из чата');

        return $match[1];
    }

    public static function getClearChatText(string $string): ?string
    {
        return Str::of($string)->after('[/b][br]');
    }

    public static function isRateMessage(string $string): ?string
    {
        $substr = config('bitrix24.B24_RATE_MESSAGE');
        return Str::of($string)->contains($substr);
    }

    public static function getContactFieldId(){
        return BitrixCrmTypeFields::whereBxName("contactId")
            ->whereBxEntityTypeId(config('bitrix24.SP_UNITS_ID'))->first()->id;
    }

    public static function getApartmentFieldId(){
        return BitrixCrmTypeFields::whereBxName("parentId" . config('bitrix24.SP_APPARTMENTS_ID'))
            ->whereBxEntityTypeId(config('bitrix24.SP_UNITS_ID'))->first()->id;
    }

    public static function getStageFieldId(){
        return BitrixCrmTypeFields::whereBxName("stageId")
            ->whereBxEntityTypeId(config('bitrix24.SP_UNITS_ID'))->first()->id;
    }

    public static function getTitleFieldId()
    {
        return BitrixCrmTypeFields::whereBxName("title")
            ->whereBxEntityTypeId(config('bitrix24.SP_UNITS_ID'))->first()->id;
    }

    /**
     * @param int $bxContactId
     * @return mixed
     */
    public static function getApartmentByContactId(int $bxContactId): mixed
    {
        $unitId = BitrixCrmContact::with(['unit', 'unit.values'])
            ->whereBxId($bxContactId)
            ->first()?->unitId;

        if (!$unitId) {
            return false;
        }

        $apartment = BitrixCrmItem::with(['values', 'apartment', "title"])
            ->whereBxId($unitId)
            ->first();

        return $apartment ?? false;
    }

    /**
     * Получение ID контактов по ID квартиры через комнаты по стадиям
     * @param int $apartmentId
     * @return array|bool
     */
    public static function getUserIdsByApartment(int $apartmentId): array|bool
    {
        $unitStages = [  // Как правильно вынести: env, db, enum
            UnitStatusEnum::CLIENT()->value,
            UnitStatusEnum::EVICTION()->value
        ];

        $apartments = BitrixCrmItem::with(['apartment','stage','contact'])
            ->apartments($apartmentId)
            ->stages($unitStages)
            ->get()
            ->pluck("contact")
            ->flatten()
            ->toArray();

        $userIds = [];
        foreach ($apartments as $apartment){
            $userIds[] = $apartment['bx_id'];
        }

        return count($userIds) ? $userIds : false;
    }

    public static function apartmentChatMessage(BitrixApartmentChatData $dto): BitrixSendMessageData
    {

        $prefix = config('bitrix24.SP_APPARTMENTS_ID');
        $phone = str_pad($dto->bx_apartment_id, 9, "0", STR_PAD_LEFT);
        return BitrixSendMessageData::from(
            [
                "user"    => [
                    "id"   => $dto->bx_apartment_id,
                    "name" => $dto->title,
                    "phone" => "7({$prefix}){$phone}",
                    "skip_phone_validate" => 'Y',
                ],
                "message" => [
                    "message" => $dto->title,
                    "user_id" => $dto->bx_apartment_id
                ],
                "chat"    => [
                    "id" => $dto->bx_chat_uid
                ]
            ]
        );
    }

    public static function tenantChatMessage(BitrixTenantChatData $dto): BitrixSendMessageData
    {

        return BitrixSendMessageData::from(
            [
                "user"    => [
                    "id"   => $dto->bx_user_id,
                    "name" => $dto->user->name,
                    "last_name" => $dto->user->last_name,
                    "phone" => $dto->user->phone,
                    "skip_phone_validate" => 'Y',
                ],
                "message" => [
                    "message" => "Чат с жильцом создан: " . $dto->user->name,
                    "user_id" => $dto->bx_user_id
                ],
                "chat"    => [
                    "id" => $dto->bx_chat_uid
                ]
            ]
        );
    }

}
