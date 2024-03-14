<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Services\Bitrix\Models\BitrixContactUserFields
 *
 * @property int $id
 * @property int|null $bx_id
 * @property string|null $bx_entity_id
 * @property string|null $bx_name
 * @property string|null $bx_type
 * @property int|null $multiple
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read int|null $values_count
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields whereBxEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields whereBxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields whereBxName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields whereBxType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields whereMultiple($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property string|null $entity_id
 * @property string|null $field_name
 * @property string|null $type
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields whereFieldName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields whereType($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @mixin \Eloquent
 */
class BitrixContactUserFields extends Model
{
    use HasFactory;

    protected $connection = 'bitrix';

    public $timestamps = false;

    protected $table = 'crm_contact_user_fields';

    protected $fillable = ['bx_id','bx_entity_id','bx_name','bx_type','multiple'];

    protected $visible = ['id', 'bx_id','bx_entity_id,','bx_name','bx_type'];

    public function values(): HasMany
    {
        return $this->hasMany(BitrixContactUserFieldsValues::class,'userfield_id','id');
    }
}
