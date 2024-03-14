<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Services\Bitrix\Models\BitrixContactUserFieldsValues
 *
 * @property int $id
 * @property int|null $userfield_id
 * @property int|null $bx_id
 * @property int|null $ext_id
 * @property int|null $sort
 * @property string|null $value
 * @property-read \App\Services\Bitrix\Models\BitrixContactUserFields|null $field
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFieldsValues newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFieldsValues newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFieldsValues query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFieldsValues whereBxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFieldsValues whereExtId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFieldsValues whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFieldsValues whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFieldsValues whereUserfieldId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFieldsValues whereValue($value)
 * @mixin \Eloquent
 */
class BitrixContactUserFieldsValues extends Model
{
    use HasFactory;


    protected $connection = 'bitrix';

    public $timestamps = false;

    protected $table = 'contact_user_fields_values';

    protected $fillable = ['bx_id','ext_id','userfield_id','sort','value'];

    protected $visible = ['id','ext_id','bx_id','sort,','value'];

    public function field(): BelongsTo
    {
        return $this->belongsTo(BitrixContactUserFields::class,'id','userfield_id');
    }
}
