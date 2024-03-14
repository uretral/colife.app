<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Services\Bitrix\Models\BitrixCrmType
 *
 * @property int $id
 * @property int|null $bx_id
 * @property string|null $bx_name
 * @property string|null $bx_entity_id
 * @property int|null $bx_entity_type_id
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read int|null $fields_count
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType whereBxEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType whereBxEntityTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType whereBxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType whereBxName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @mixin \Eloquent
 */
class BitrixCrmType extends Model
{
    use HasFactory;

    protected $connection = 'bitrix';

    protected $table = 'crm_type';

    protected $with = ['fields'];

    protected $fillable = [
        'bx_id',
        'bx_entity_id',
        'bx_entity_type_id',
        'bx_name',
        'description',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function fields(): HasMany
    {
        return $this->hasMany(BitrixCrmTypeFields::class,'bx_entity_type_id','bx_entity_type_id');
    }
}
