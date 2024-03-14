<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


/**
 * App\Services\Bitrix\Models\BitrixUserFieldData
 *
 * @property int $id
 * @property int|null $field_id
 * @property int|null $bx_id
 * @property int|null $ext_id
 * @property int|null $userFieldId
 * @property string|null $value
 * @property int|null $sort
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read int|null $field_count
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserFieldData newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserFieldData newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserFieldData query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserFieldData whereBxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserFieldData whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserFieldData whereExtId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserFieldData whereFieldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserFieldData whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserFieldData whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserFieldData whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserFieldData whereUserFieldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserFieldData whereValue($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserField> $field
 * @mixin \Eloquent
 */
class BitrixUserFieldData extends Model
{
    use HasFactory;

    protected $connection = 'bitrix';

    protected $table = 'user_fields_data';

    protected $casts = [
    ];

    protected $fillable = [
        'field_id',
        'bx_id',
        'ext_id',
        'value',
        'userFieldId',
        'sort',
    ];

    public $timestamps = true;

    public function field(): HasMany
    {
        return $this->hasMany(BitrixUserField::class,'id','field_id');
    }
}
