<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Services\Bitrix\Models\BitrixCrmFields
 *
 * @property int $id
 * @property string|null $bx_name
 * @property string|null $model
 * @property string|null $type
 * @property string|null $title
 * @property string|null $label
 * @property int|null $isRequired
 * @property int|null $isMultiple
 * @property int|null $isDynamic
 * @property array|null $settings
 * @property-read \App\Services\Bitrix\Models\BitrixCrmDeal|null $deal
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields whereBxName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields whereIsDynamic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields whereIsMultiple($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields whereIsRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields whereType($value)
 * @property-read int|null $deal_count
 * @mixin \Eloquent
 */
class BitrixCrmFields extends Model
{
    use HasFactory;

    protected $connection = 'bitrix';

    protected $table = 'crm_fields';

    protected $with = [];

    protected $hidden = ['id'];

    protected $casts = [
        'settings' => 'array'
    ];

    protected $fillable = [
        'bx_name',
        'model',
        'type',
        'title',
        'label',
        'isRequired',
        'isMultiple',
        'isDynamic',
        'settings',
    ];

    public $timestamps = false;

    public function deal(): HasMany
    {
        return $this->hasMany(BitrixCrmDeal::class, BitrixCrmDeal::class, 'model');
    }
}
