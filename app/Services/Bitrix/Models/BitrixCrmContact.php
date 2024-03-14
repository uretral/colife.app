<?php

namespace App\Services\Bitrix\Models;

use App\Services\Bitrix\Helpers\BitrixHelper;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Services\Bitrix\Models\BitrixCrmContact
 *
 * @property int $id
 * @property int|null $bx_id
 * @property string|null $name
 * @property string|null $second_name
 * @property string|null $last_name
 * @property int|null $type_id
 * @property int|null $source_id
 * @property string|null $city
 * @property string|null $birth_date
 * @property int|null $age
 * @property string|null $instagram
 * @property string|null $telegram
 * @property string|null $tiktok
 * @property string|null $vk
 * @property string|null $facebook
 * @property int|null $rental_price
 * @property int|null $max_points_payment
 * @property string|null $passport_num
 * @property string|null $passport_issued
 * @property int|null $lk_registered
 * @property int|null $gender_id Ссылка contact_user_fields_values
 * @property string|null $tenant_description
 * @property string|null $landlord_description Оперативная информация о собственнике
 * @property int|null $group_id Planfix group id
 * @property string|null $auth_url
 * @property int|null $email_confirmed
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixEmail> $email
 * @property-read int|null $email_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixPhone> $phone
 * @property-read int|null $phone_count
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereAuthUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereBirthDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereBxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereEmailConfirmed($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereGenderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereLandlordDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereLkRegistered($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereMaxPointsPayment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact wherePassportIssued($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact wherePassportNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereRentalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereSecondName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereSourceId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereTelegram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereTenantDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereTiktok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereVk($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixEmail> $email
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixPhone> $phone
 * @property string $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixEmail> $email
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixPhone> $phone
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContact whereDeletedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixEmail> $email
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixPhone> $phone
 * @property-read mixed $unit_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $unit
 * @property-read int|null $unit_count
 * @mixin \Eloquent
 */
class BitrixCrmContact extends Model
{
    use HasFactory;

    protected $connection = 'bitrix';

    public static $snakeAttributes = false;

    protected $table = 'crm_contacts';

    protected $with = ['phone', 'email'];

    protected $hidden = ['id','created_at','updated_at'];

    protected $fillable = [
        'bx_id',
        'name',
        'second_name',
        'last_name',
        'type_id',
        'source_id',
        'city',
        'birth_date',
        'age',
        'instagram',
        'telegram',
        'tiktok',
        'vk',
        'passport_num',
        'passport_issued',
        'facebook',
        'rental_price',
        'max_points_payment',
        'lk_registered',
        'gender_id',
        'tenant_description',
        'landlord_description',
        'group_id',
        'auth_url',
        'email_confirmed',
        'created_at',
        'updated_at',
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

    function unit()
    {
        return $this->belongsToMany(BitrixCrmItem::class,BitrixCrmItemValue::class,
            'value',
            'crm_item_id',
            'bx_id'
        )
            ->wherePivot('crm_type_field_id',BitrixHelper::getContactFieldId());
    }


    function getUnitIdAttribute()
    {
        return $this->unit()->first()?->bx_id ?? null;
    }

    /**
     * Имя Фамилия
     *
     * @return  \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function fullName(): Attribute
    {
        return Attribute::make(
            get: fn ($value, $attributes) => $attributes['name'] . " " . $attributes['last_name'],
        );
    }
}
