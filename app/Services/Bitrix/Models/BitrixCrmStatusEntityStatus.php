<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Services\Bitrix\Models\BitrixCrmStatusEntityStatus
 *
 * @property int $id
 * @property int|null $crm_status_entity_id
 * @property int|null $bx_id
 * @property string|null $status
 * @property string|null $name
 * @property string|null $name_init
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatusEntityStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatusEntityStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatusEntityStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatusEntityStatus whereBxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatusEntityStatus whereCrmStatusEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatusEntityStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatusEntityStatus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatusEntityStatus whereNameInit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatusEntityStatus whereStatus($value)
 * @mixin \Eloquent
 */
class BitrixCrmStatusEntityStatus extends Model
{
    use HasFactory;

    protected $connection = 'bitrix';

    protected $table = 'crm_status_entity_statuses';

    protected $fillable = ['crm_status_entity_id','bx_id','status','name','name_init',];

    public $timestamps = false;
}
