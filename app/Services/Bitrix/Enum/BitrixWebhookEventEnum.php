<?php

namespace App\Services\Bitrix\Enum;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self ITEM_CREATED()
 * @method static self ITEM_UPDATED()
 * @method static self ITEM_DELETED()
 * @method static self CONTACT_CREATED()
 * @method static self CONTACT_UPDATED()
 * @method static self CONTACT_DELETED()
 */
final class BitrixWebhookEventEnum extends Enum
{
    protected static function values()
    {
        {
            return [
                // Запись в смарт процессах
                'ITEM_CREATED'    => 'ONCRMDYNAMICITEMADD',
                'ITEM_UPDATED'    => 'ONCRMDYNAMICITEMUPDATE',
                'ITEM_DELETED'    => 'ONCRMDYNAMICITEMDELETE',

                // Данные пользователя / Contac
                'CONTACT_CREATED' => 'ONCRMCONTACTADD',
                'CONTACT_UPDATED' => 'ONCRMCONTACTUPDATE',
                'CONTACT_DELETED' => 'ONCRMCONTACTDELETE',
            ];
        }
    }

}
