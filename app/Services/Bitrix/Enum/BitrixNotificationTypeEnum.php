<?php

namespace App\Services\Bitrix\Enum;

use Spatie\Enum\Laravel\Enum;

/**
 * @method static self EMPTY()
 * @method static self EMAIL()
 * @method static self SMS()
 */
final class BitrixNotificationTypeEnum extends Enum
{

/* Получить актуальные значения можно запросом:

    select ufd.id, ufd.bx_id, ufd.value, ufd.sort
    from user_fields uf
             left join user_fields_data ufd on uf.id = ufd.field_id
    where uf.fieldName in (select bx_name from crm_contact_fields where title = 'Оповещения об оплате')
    order by ufd.sort
*/

    protected static function values()
    {
        {
            return [
                'EMPTY' => 1330,
                'EMAIL' => 1256,
                'SMS'   => 1258,
            ];
        }
    }

}
