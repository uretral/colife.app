<?php

namespace App\Services\Bitrix\Models;

use App\Services\Bitrix\Helpers\BitrixHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Services\Bitrix\Models\BitrixCrmItemValue
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmItemValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmItemValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmItemValue query()
 * @property-read \App\Services\Bitrix\Models\BitrixCrmItem|null $unit
 * @mixin \Eloquent
 */
class BitrixCrmItemValue extends Pivot
{
    use HasFactory;

    protected $table = 'crm_item_values';

    protected $casts = [
        'value' => 'array'
    ];

    public static $snakeAttributes = false;

    protected $hidden = ['created_at','updated_at'];

//    public function contact()
//    {
//        return $this->belongsTo(BitrixCrmContact::class)->where('crm_type_field_id',BitrixHelper::getContactFieldId());
//    }

    public function unit()
    {
        return $this->belongsTo(BitrixCrmItem::class)
            ->where('crm_type_field_id',140);
    }
}
