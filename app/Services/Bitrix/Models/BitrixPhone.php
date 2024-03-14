<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Services\Bitrix\Models\BitrixPhone
 *
 * @property int $id
 * @property int|null $bx_id
 * @property int|null $contact_id
 * @property string|null $value
 * @property string|null $value_type Перенести в справочник?
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Services\Bitrix\Models\BitrixCrmContact|null $contact
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixPhone newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixPhone newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixPhone query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixPhone whereBxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixPhone whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixPhone whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixPhone whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixPhone whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixPhone whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixPhone whereValueType($value)
 * @mixin \Eloquent
 */
class BitrixPhone extends Model
{
    use HasFactory;

    const WORK = 'WORK';
    const MOBILE = 'MOBILE';


    protected $connection = 'bitrix';

    protected $table = 'crm_contact_phones';

    protected $fillable = ['bx_id','contact_id','value','value_type','created_at','updated_at'];

    protected $visible = ['bx_id','value','value_type'];

    public function contact(): BelongsTo
    {
        return $this->belongsTo(BitrixCrmContact::class,'contact_id','id');
    }
}
