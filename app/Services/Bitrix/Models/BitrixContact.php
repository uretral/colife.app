<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Services\Bitrix\Models\BitrixContact
 *
 * @deprecated На будущее, в рамках парадигмы Битрикс. На текущий момент не используется.
 * Class BitrixContact
 * @package App\Services\Bitrix\Models
 * @property int $id
 * @property int|null $BX_ID
 * @property string|null $NAME
 * @property string|null $SECOND_NAME
 * @property string|null $LAST_NAME
 * @property string|null $PHOTO
 * @property string|null $BIRTHDATE
 * @property int|null $TYPE_ID
 * @property int|null $SOURCE_ID
 * @property string|null $SOURCE_DESCRIPTION
 * @property string|null $POST
 * @property string|null $ADDRESS
 * @property string|null $ADDRESS_2
 * @property string|null $ADDRESS_CITY
 * @property string|null $ADDRESS_POSTAL_CODE
 * @property string|null $ADDRESS_REGION
 * @property string|null $ADDRESS_PROVINCE
 * @property string|null $ADDRESS_COUNTRY
 * @property string|null $ADDRESS_COUNTRY_CODE
 * @property string|null $OPENED
 * @property string|null $COMMENTS
 * @property string|null $EXPORT
 * @property int|null $ASSIGNED_BY_ID
 * @property int|null $CREATED_BY_ID
 * @property int|null $MODIFY_BY_ID
 * @property \Illuminate\Support\Carbon|null $DATE_CREATE
 * @property \Illuminate\Support\Carbon|null $DATE_MODIFY
 * @property int|null $COMPANY_ID
 * @property int|null $LEAD_ID
 * @property int|null $ORIGINATOR_ID
 * @property int|null $ORIGIN_ID
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixEmail> $email
 * @property-read int|null $email_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixPhone> $phone
 * @property-read int|null $phone_count
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereADDRESS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereADDRESS2($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereADDRESSCITY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereADDRESSCOUNTRY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereADDRESSCOUNTRYCODE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereADDRESSPOSTALCODE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereADDRESSPROVINCE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereADDRESSREGION($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereASSIGNEDBYID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereBIRTHDATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereBXID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereCOMMENTS($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereCOMPANYID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereCREATEDBYID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereDATECREATE($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereDATEMODIFY($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereEXPORT($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereLASTNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereLEADID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereMODIFYBYID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereOPENED($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereORIGINATORID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereORIGINID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact wherePHOTO($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact wherePOST($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereSECONDNAME($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereSOURCEDESCRIPTION($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereSOURCEID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereTYPEID($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContact whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixEmail> $email
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixPhone> $phone
 * @mixin \Eloquent
 */
class BitrixContact extends Model
{
    use HasFactory;

    protected $connection = 'bitrix';

    protected $table = 'crm_contact';

    protected $with = ['phone', 'email'];

    protected $hidden = ['id', 'created_at', 'updated_at'];

    public const CREATED_AT = 'DATE_CREATE';
    public const UPDATED_AT = 'DATE_MODIFY';

    protected $fillable = [
        'BX_ID',
        'NAME',
        'SECOND_NAME',
        'LAST_NAME',
        'PHOTO',
        'BIRTHDATE',
        'TYPE_ID',
        'SOURCE_ID',
        'SOURCE_DESCRIPTION',
        'POST',
        'ADDRESS',
        'ADDRESS_2',
        'ADDRESS_CITY',
        'ADDRESS_POSTAL_CODE',
        'ADDRESS_REGION',
        'ADDRESS_PROVINCE',
        'ADDRESS_COUNTRY',
        'ADDRESS_COUNTRY_CODE',
        'OPENED',
        'COMMENTS',
        'EXPORT',
        'ASSIGNED_BY_ID',
        'CREATED_BY_ID',
        'MODIFY_BY_ID',
        'DATE_CREATE',
        'DATE_MODIFY',
        'COMPANY_ID',
        'LEAD_ID',
        'ORIGINATOR_ID',
        'ORIGIN_ID'
    ];

    public $timestamps = true;

    public function email(): HasMany
    {
        return $this->hasMany(BitrixEmail::class, 'contact_id', 'id');
    }

    public function phone(): HasMany
    {
        return $this->hasMany(BitrixPhone::class, 'contact_id', 'id');
    }
}
