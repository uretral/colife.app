<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;


/**
 * App\Services\Bitrix\Models\BitrixUserField
 *
 * @property int $id
 * @property int|null $bx_id
 * @property int|null $ext_id
 * @property string|null $entityId
 * @property string|null $model
 * @property string|null $fieldName
 * @property string|null $userTypeId
 * @property string|null $xmlId
 * @property int|null $sort
 * @property string $multiple
 * @property string $mandatory
 * @property string $showFilter
 * @property string $showInList
 * @property string $editInList
 * @property string $isSearchable
 * @property array|null $settings
 * @property array|null $editFormLabel
 * @property array|null $listColumnLabel
 * @property array|null $listFilterLabel
 * @property array|null $errorMessage
 * @property array|null $helpMessage
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read int|null $values_count
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereBxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereEditFormLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereEditInList($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereErrorMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereExtId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereFieldName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereHelpMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereIsSearchable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereListColumnLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereListFilterLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereMandatory($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereMultiple($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereShowFilter($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereShowInList($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereUserTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixUserField whereXmlId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixUserFieldData> $values
 * @mixin \Eloquent
 */
class BitrixUserField extends Model
{
    use HasFactory;

    protected $connection = 'bitrix';

    protected $table = 'user_fields';

    protected $with = ['values'];

    protected $casts = [
        'settings'        => 'array',
        'editFormLabel'   => 'array',
        'listColumnLabel' => 'array',
        'listFilterLabel' => 'array',
        'errorMessage'    => 'array',
        'helpMessage'     => 'array',
    ];

    protected $fillable = [
        'bx_id',
        'ext_id',
        'entityId',
        'model',
        'fieldName',
        'userTypeId',
        'xmlId',
        'sort',
        'multiple',
        'mandatory',
        'showFilter',
        'showInList',
        'editInList',
        'isSearchable',
        'settings',
        'editFormLabel',
        'listColumnLabel',
        'listFilterLabel',
        'errorMessage',
        'helpMessage',
        'created_at',
        'updated_at',
    ];

    public $timestamps = true;

    public function values(): HasMany
    {
        return $this->hasMany(BitrixUserFieldData::class, 'field_id', 'id');
    }

    public function description(): HasOne
    {
        return $this->hasOne($this->model, 'upperName', 'fieldName');
    }

}
