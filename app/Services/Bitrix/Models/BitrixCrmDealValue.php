<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\Pivot;

/**
 * App\Services\Bitrix\Models\BitrixCrmDealValue
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealValue query()
 * @property-read \App\Services\Bitrix\Models\BitrixCrmFields|null $field
 * @mixin \Eloquent
 */
class BitrixCrmDealValue extends Pivot
{
    use HasFactory;

    protected $table = 'crm_deal_values';

    protected $casts = [
        'value' => 'array'
    ];

    public $timestamps = false;

    public function field(): HasOne
    {
        return $this->hasOne(BitrixCrmFields::class,'id','field_id');
    }
}
