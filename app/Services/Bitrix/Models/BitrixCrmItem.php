<?php

namespace App\Services\Bitrix\Models;

use App\Services\Bitrix\Helpers\BitrixHelper;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

/**
 * App\Services\Bitrix\Models\BitrixCrmItem
 *
 * @property int $id
 * @property int $bx_id
 * @property int $bx_entity_type_id
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read int|null $fields_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $values
 * @property-read int|null $values_count
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmItem whereBxEntityTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmItem whereBxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmItem whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $apartment
 * @property-read int|null $apartment_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmContact> $contact
 * @property-read int|null $contact_count
 * @property-read mixed $apartment_id
 * @property-read mixed $contact_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $title
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $stage
 * @property-read int|null $stage_count
 * @property-read int|null $title_count
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmItem apartments($apartmentId)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmItem stages(array $stageIds)
 * @mixin \Eloquent
 */
class BitrixCrmItem extends Model
{
    use HasFactory;

    protected $connection = 'bitrix';

    protected $table = 'crm_items';

    public static $snakeAttributes = false;

//    protected $with = ['values'];

    protected $fillable = [
        'bx_id',
        'bx_entity_type_id',
        'created_at',
        'updated_at',
    ];

    public $timestamps = false;

    public function fields(){

        return $this->hasMany(BitrixCrmTypeFields::class,'bx_entity_type_id','bx_entity_type_id');
    }

    function contact()
    {
        return $this->belongsToMany(BitrixCrmContact::class,BitrixCrmItemValue::class,
            'crm_item_id',
            'value',
            'id',
            'bx_id'
        )
            ->wherePivot('crm_type_field_id',BitrixHelper::getContactFieldId());
    }


    function getContactIdAttribute()
    {
        return $this->contact()->first()?->bx_id ?? null;
    }

    public function values(): BelongsToMany
    {

        return $this->belongsToMany(BitrixCrmTypeFields::class,
            'crm_item_values','crm_item_id',
            'crm_type_field_id','id','id')
            ->withPivot('value')
            ->withTimestamps()
            ->using(BitrixCrmItemValue::class);
    }

    public function apartment(): BelongsToMany
    {

        return $this->belongsToMany(BitrixCrmTypeFields::class,
            'crm_item_values','crm_item_id',
            'crm_type_field_id','id','id')
            ->withPivot('value')
            ->using(BitrixCrmItemValue::class)
            ->wherePivot('crm_type_field_id',BitrixHelper::getApartmentFieldId());
    }

    public function scopeApartments($query,$apartmentId)
    {
        return $query->whereHas('apartment', fn($q) => $q->where("value", $apartmentId));
    }

    function getApartmentIdAttribute()
    {
        return $this->apartment()->first()?->pivot->value ?? null;
    }

    public function stage(): BelongsToMany
    {

        return $this->belongsToMany(BitrixCrmTypeFields::class,
            'crm_item_values','crm_item_id',
            'crm_type_field_id','id','id')
            ->withPivot('value')
            ->using(BitrixCrmItemValue::class)
            ->wherePivot('crm_type_field_id',BitrixHelper::getStageFieldId());
    }

    public function scopeStages($query,array $stageIds)
    {
        return $query->whereHas('stage', fn($q) => $q->whereIn("value", $stageIds));
    }


    public function title(): BelongsToMany
    {

        return $this->belongsToMany(BitrixCrmTypeFields::class,
            'crm_item_values','crm_item_id',
            'crm_type_field_id','id','id')
            ->withPivot('value')
            ->using(BitrixCrmItemValue::class)
            ->wherePivot('crm_type_field_id',BitrixHelper::getTitleFieldId());
    }

    function getTitleAttribute()
    {
        return $this->title()->first()?->pivot->value ?? null;
    }
}
