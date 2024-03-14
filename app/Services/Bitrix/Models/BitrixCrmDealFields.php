<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Services\Bitrix\Models\BitrixCrmDealFields
 *
 * @property-read \App\Services\Bitrix\Models\BitrixCrmDeal|null $deal
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealFields newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealFields newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealFields query()
 * @mixin \Eloquent
 */
class BitrixCrmDealFields extends Model
{
    use HasFactory;

    protected $connection = 'bitrix';

    protected $table = 'crm_deal_fields';

    protected $with = ['deal'];

    protected $hidden = ['id'];

    protected $fillable = [
        'bx_id',
        'title',
        'description',
    ];

    public $timestamps = false;

    public function deal(): BelongsTo
    {
        return $this->belongsTo(BitrixCrmDeal::class, 'bx_id', 'bx_id');
    }
}
