<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Services\Bitrix\Models\BitrixEmail
 *
 * @property int $id
 * @property int|null $bx_id
 * @property int|null $contact_id
 * @property string|null $value
 * @property string|null $value_type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Services\Bitrix\Models\BitrixCrmContact|null $contact
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEmail newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEmail newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEmail query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEmail whereBxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEmail whereContactId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEmail whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEmail whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEmail whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEmail whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEmail whereValueType($value)
 * @mixin \Eloquent
 */
class BitrixEmail extends Model
{
    use HasFactory;

    protected $connection = 'bitrix';

    protected $table = 'crm_contact_emails';

    protected $fillable = ['bx_id','contact_id','value','value_type','created_at','updated_at'];

    protected $visible = ['bx_id','value','value_type'];

    public function contact(): BelongsTo
    {
        return $this->belongsTo(BitrixCrmContact::class,'contact_id','id');
    }
}
