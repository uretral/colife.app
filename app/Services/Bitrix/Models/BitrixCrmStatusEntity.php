<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Services\Bitrix\Models\BitrixCrmStatusEntity
 *
 * @property int $id
 * @property int|null $bx_id
 * @property string|null $bx_name
 * @property string|null $name
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read int|null $statuses_count
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatusEntity newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatusEntity newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatusEntity query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatusEntity whereBxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatusEntity whereBxName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatusEntity whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatusEntity whereName($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus> $statuses
 * @mixin \Eloquent
 */
class BitrixCrmStatusEntity extends Model
{
    use HasFactory;

    protected $connection = 'bitrix';

    protected $table = 'crm_status_entities';

    protected $fillable = ['bx_id','bx_name','name',];

    public $timestamps = false;

    protected $with = ['statuses'];

    public function statuses(): HasMany{
        return $this->hasMany(BitrixCrmStatusEntityStatus::class,'crm_status_entity_id','id');
    }
}
