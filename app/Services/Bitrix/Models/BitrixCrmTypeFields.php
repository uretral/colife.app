<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Services\Bitrix\Models\BitrixCrmTypeFields
 *
 * @property int $id
 * @property int|null $bx_entity_type_id
 * @property string|null $bx_name
 * @property string|null $title
 * @property \App\Services\Bitrix\Models\BitrixCrmType|null $type
 * @property int|null $isRequired
 * @property int|null $isDynamic
 * @property int|null $isImmutable
 * @property string|null $upperName
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read int|null $values_count
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereBxEntityTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereBxName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereIsDynamic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereIsImmutable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereIsRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereUpperName($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property array|null $items
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereItems($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @mixin \Eloquent
 */
class BitrixCrmTypeFields extends Model
{
    use HasFactory;

    protected $connection = 'bitrix';

    protected $table = 'crm_type_fields';

    public static $snakeAttributes = false;

    protected $with = [];

    protected $fillable = [
        'crm_type_id',
        'bx_entity_type_id',
        'bx_name',
        'title',
        'type',
        'isRequired',
        'isDynamic',
        'isImmutable',
        'upperName',
        'items',
    ];

    protected $casts = [
        'items' => 'array'
    ];

    public $timestamps = false;

    public function type(): HasOne
    {
        return $this->hasOne(BitrixCrmType::class, 'bx_entity_type_id', 'bx_entity_type_id');
    }

//
    public function values()
    {
        return $this->belongsToMany(
            BitrixCrmItem::class,
            'crm_item_values'
        )
            ->withPivot('value');
    }
}
