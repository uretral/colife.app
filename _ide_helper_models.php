<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Lang
 *
 * @property int $id
 * @property int $active
 * @property int $order
 * @property int|null $is_default
 * @property string $title
 * @property string $code
 * @property string|null $abbr
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Locales newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Locales newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Locales query()
 * @method static \Illuminate\Database\Eloquent\Builder|Locales whereAbbr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locales whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locales whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locales whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locales whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locales whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locales whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locales whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locales whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class Locales extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $google_id
 * @property string|null $deleted_at
 * @property int|null $bx_id
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGoogleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
/**
 * App\Services\Bitrix\Models\BitrixApartmentChat
 *
 * @property int $id
 * @property int|null $bx_apartment_id
 * @property int|null $bx_chat_id
 * @property string|null $bx_chat_uid
 * @property int|null $bx_user_id
 * @property int|null $bx_chat_user_id
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixApartmentChatUser> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChat query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChat whereBxApartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChat whereBxChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChat whereBxChatUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChat whereBxChatUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChat whereBxUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChat whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChat whereId($value)
 * @mixin \Eloquent
 */
	class BitrixApartmentChat extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
/**
 * App\Services\Bitrix\Models\BitrixApartmentChatUser
 *
 * @property int $id
 * @property int|null $bx_apartment_id
 * @property int|null $bx_user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon $deleted_at
 * @property-read \App\Services\Bitrix\Models\BitrixApartmentChat|null $apartment
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmContact> $user
 * @property-read int|null $user_count
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChatUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChatUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChatUser onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChatUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChatUser whereBxApartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChatUser whereBxUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChatUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChatUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChatUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChatUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChatUser withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChatUser withoutTrashed()
 * @mixin \Eloquent
 */
	class BitrixApartmentChatUser extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
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
	class BitrixContact extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
/**
 * App\Services\Bitrix\Models\BitrixContactUserFields
 *
 * @property int $id
 * @property int|null $bx_id
 * @property string|null $bx_entity_id
 * @property string|null $bx_name
 * @property string|null $bx_type
 * @property int|null $multiple
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read int|null $values_count
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields whereBxEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields whereBxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields whereBxName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields whereBxType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields whereMultiple($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property string|null $entity_id
 * @property string|null $field_name
 * @property string|null $type
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields whereFieldName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixContactUserFields whereType($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixContactUserFieldsValues> $values
 * @mixin \Eloquent
 */
	class BitrixContactUserFields extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
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
	class BitrixContactUserFieldsValues extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
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
	class BitrixCrmContact extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
/**
 * App\Services\Bitrix\Models\BitrixCrmContactFields
 *
 * @property int $id
 * @property string|null $bx_name
 * @property string|null $type
 * @property string|null $title
 * @property string|null $label
 * @property int|null $isRequired
 * @property int|null $isMultiple
 * @property int|null $isDynamic
 * @property mixed|null $settings
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields whereBxName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields whereIsDynamic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields whereIsMultiple($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields whereIsRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmContactFields whereType($value)
 * @mixin \Eloquent
 */
	class BitrixCrmContactFields extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
/**
 * App\Services\Bitrix\Models\BitrixCrmDeal
 *
 * @property int $id
 * @property int|null $bx_id
 * @property int|null $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Services\Bitrix\Models\BitrixCrmDealCategories|null $category
 * @property-read \App\Services\Bitrix\Models\BitrixCrmContact|null $contact
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmDealFields> $fields
 * @property-read int|null $fields_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmDealFields> $values
 * @property-read int|null $values_count
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDeal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDeal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDeal query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDeal whereBxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDeal whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDeal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDeal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDeal whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmFields> $values
 * @mixin \Eloquent
 */
	class BitrixCrmDeal extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
/**
 * App\Services\Bitrix\Models\BitrixCrmDealCategories
 *
 * @property int $id
 * @property int|null $bx_id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $slug
 * @property-read \App\Services\Bitrix\Models\BitrixCrmDeal|null $deal
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealCategories newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealCategories newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealCategories query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealCategories whereBxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealCategories whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealCategories whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealCategories whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealCategories whereTitle($value)
 * @mixin \Eloquent
 */
	class BitrixCrmDealCategories extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
/**
 * App\Services\Bitrix\Models\BitrixCrmDealFields
 *
 * @property-read \App\Services\Bitrix\Models\BitrixCrmDeal|null $deal
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealFields newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealFields newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealFields query()
 * @mixin \Eloquent
 */
	class BitrixCrmDealFields extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
/**
 * App\Services\Bitrix\Models\BitrixCrmDealValue
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmDealValue query()
 * @property-read \App\Services\Bitrix\Models\BitrixCrmFields|null $field
 * @mixin \Eloquent
 */
	class BitrixCrmDealValue extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
/**
 * App\Services\Bitrix\Models\BitrixCrmFields
 *
 * @property int $id
 * @property string|null $bx_name
 * @property string|null $model
 * @property string|null $type
 * @property string|null $title
 * @property string|null $label
 * @property int|null $isRequired
 * @property int|null $isMultiple
 * @property int|null $isDynamic
 * @property array|null $settings
 * @property-read \App\Services\Bitrix\Models\BitrixCrmDeal|null $deal
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields whereBxName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields whereIsDynamic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields whereIsMultiple($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields whereIsRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields whereLabel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmFields whereType($value)
 * @property-read int|null $deal_count
 * @mixin \Eloquent
 */
	class BitrixCrmFields extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
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
	class BitrixCrmItem extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
/**
 * App\Services\Bitrix\Models\BitrixCrmItemValue
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmItemValue newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmItemValue newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmItemValue query()
 * @property-read \App\Services\Bitrix\Models\BitrixCrmItem|null $unit
 * @mixin \Eloquent
 */
	class BitrixCrmItemValue extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
/**
 * App\Services\Bitrix\Models\BitrixCrmStatus
 *
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmStatus query()
 * @mixin \Eloquent
 */
	class BitrixCrmStatus extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
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
	class BitrixCrmStatusEntity extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
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
	class BitrixCrmStatusEntityStatus extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
/**
 * App\Services\Bitrix\Models\BitrixCrmType
 *
 * @property int $id
 * @property int|null $bx_id
 * @property string|null $bx_name
 * @property string|null $bx_entity_id
 * @property int|null $bx_entity_type_id
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read int|null $fields_count
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType whereBxEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType whereBxEntityTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType whereBxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType whereBxName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmType whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmTypeFields> $fields
 * @mixin \Eloquent
 */
	class BitrixCrmType extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
/**
 * App\Services\Bitrix\Models\BitrixCrmTypeFields
 *
 * @property int $id
 * @property int|null $bx_entity_type_id
 * @property string|null $bx_name
 * @property string|null $title
 * @property \App\Services\Bitrix\Models\BitrixCrmType|null $type
 * @property int|null $isRequired
 * @property int|null $isDynamic
 * @property int|null $isImmutable
 * @property string|null $upperName
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read int|null $values_count
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereBxEntityTypeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereBxName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereIsDynamic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereIsImmutable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereIsRequired($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereUpperName($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property array|null $items
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixCrmTypeFields whereItems($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixCrmItem> $values
 * @mixin \Eloquent
 */
	class BitrixCrmTypeFields extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
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
	class BitrixEmail extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
/**
 * App\Services\Bitrix\Models\BitrixEntityModel
 *
 * @property int $id
 * @property string|null $entityId Сущность Битрикс: https://dev.1c-bitrix.ru/rest_help/userfieldconfig/entityId.php
 * @property string|null $model Наименование модели Laravel
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEntityModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEntityModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEntityModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEntityModel whereEntityId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEntityModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixEntityModel whereModel($value)
 * @mixin \Eloquent
 */
	class BitrixEntityModel extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
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
	class BitrixPhone extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
/**
 * App\Services\Bitrix\Models\BitrixApartmentChat
 *
 * @property int $id
 * @property int|null $bx_apartment_id
 * @property int|null $bx_chat_id
 * @property string|null $bx_chat_uid
 * @property int|null $bx_user_id
 * @property int|null $bx_chat_user_id
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Services\Bitrix\Models\BitrixApartmentChatUser> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChat query()
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChat whereBxApartmentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChat whereBxChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChat whereBxChatUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChat whereBxChatUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChat whereBxUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChat whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixApartmentChat whereId($value)
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property-read \App\Services\Bitrix\Models\BitrixCrmContact|null $contact
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixTenantChat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BitrixTenantChat whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class BitrixTenantChat extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
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
	class BitrixUserField extends \Eloquent {}
}

namespace App\Services\Bitrix\Models{
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
	class BitrixUserFieldData extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * Modules\Lk\Entities;
 *
 * @property int $id
 * @property int $theme_id
 * @property int $type_id
 * @property int $status_id
 * @property string $lastMessage
 * @property string $firstMessage
 * @property int $active
 * @property int $score
 * @property \Illuminate\Support\Carbon|null $delivered_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\AppealMessage> $messages
 * @property-read int|null $messages_count
 * @property-read \Modules\Lk\Entities\AppealStatus|null $status
 * @property-read \Modules\Lk\Entities\AppealTheme|null $theme
 * @property-read \Modules\Lk\Entities\AppealThemeType|null $themeType
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $users
 * @property-read int|null $users_count
 * @method static Builder|Appeal newModelQuery()
 * @method static Builder|Appeal newQuery()
 * @method static Builder|Appeal query()
 * @method static Builder|Appeal whereActive($value)
 * @method static Builder|Appeal whereCreatedAt($value)
 * @method static Builder|Appeal whereId($value)
 * @method static Builder|Appeal whereLastMessage($value)
 * @method static Builder|Appeal whereFirstMessage($value)
 * @method static Builder|Appeal whereStatusId($value)
 * @method static Builder|Appeal whereThemeId($value)
 * @method static Builder|Appeal whereTypeId($value)
 * @method static Builder|Appeal whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\AppealUser> $appealUsers
 * @property-read int|null $appeal_users_count
 * @property-read \Modules\Lk\Entities\AppealBitrix|null $bitrix
 * @mixin \Eloquent
 * @property string|null $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|Appeal whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appeal whereScore($value)
 */
	class Appeal extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * App\Services\TenantAccount\Models\AppealBitrix
 *
 * @property-read \Modules\Lk\Entities\Appeal|null $appeal
 * @method static \Illuminate\Database\Eloquent\Builder|AppealBitrix newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealBitrix newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealBitrix query()
 * @property int $id
 * @property int $appeal_id
 * @property int|null $bx_user_id
 * @property string|null $bx_chat_uid
 * @property int|null $bx_deal_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AppealBitrix whereAppealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealBitrix whereBxChatUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealBitrix whereBxDealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealBitrix whereBxUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealBitrix whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealBitrix whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealBitrix whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class AppealBitrix extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * Modules\Layout\Entities\Tenant\LayoutAppealFile
 *
 * @property int $id
 * @property int $appeal_id
 * @property int $message_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $path
 * @property string|null $filename
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile whereAppealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class AppealFile extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * App\Services\TenantAccount\Models\LayoutAppealMessage
 *
 * @property int $id
 * @property int $support_id
 * @property int $author_id
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $appeal_id
 * @property-read int|null $files_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\AppealFile> $files
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereAppealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereUpdatedAt($value)
 * @property int|null $bx_chat_id
 * @property int|null $bx_message_id
 * @property int|null $read
 * @property string|null $delivered_at
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereBxChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereBxMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereDeliveredAt($value)
 * @mixin \Eloquent
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereDeletedAt($value)
 */
	class AppealMessage extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * Modules\Layout\Entities\Tenant\LayoutAppealStatus
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $color
 * @property string $bg
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus whereBg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $order
 * @property int $active
 * @property-read \Modules\Lk\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\Lk\Entities\Content|null $en
 * @property-read \Modules\Lk\Entities\Content|null $ru
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus whereOrder($value)
 */
	class AppealStatus extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * App\Services\TenantAccount\Models\AppealTheme
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\AppealThemeType> $types
 * @property-read int|null $types_count
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int $active
 * @property int $order
 * @property int|null $priority_id
 * @property string|null $deleted_at
 * @property-read \Modules\Lk\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\Lk\Entities\Content|null $en
 * @property-read \Modules\Lk\Entities\AppealThemePriority|null $priority
 * @property-read \Modules\Lk\Entities\Content|null $ru
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme wherePriorityId($value)
 */
	class AppealTheme extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * Modules\Lk\Entities\AppealThemePriority
 *
 * @property int $id
 * @property int $active
 * @property int $order
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemePriority newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemePriority newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemePriority query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemePriority whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemePriority whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemePriority whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemePriority whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemePriority whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemePriority whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemePriority whereUpdatedAt($value)
 */
	class AppealThemePriority extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * App\Services\TenantAccount\Models\AppealThemeType
 *
 * @property int $id
 * @property int $theme_id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType whereThemeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType whereUpdatedAt($value)
 * @property-read \Modules\Lk\Entities\AppealTheme|null $theme
 * @mixin \Eloquent
 * @property int|null $priority_id
 * @property-read \Modules\Lk\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\Lk\Entities\Content|null $en
 * @property-read \Modules\Lk\Entities\AppealThemePriority|null $priority
 * @property-read \Modules\Lk\Entities\Content|null $ru
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType wherePriorityId($value)
 */
	class AppealThemeType extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * App\Services\TenantAccount\Models\AppealUser
 *
 * @property int $id
 * @property int|null $appeal_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AppealUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealUser whereAppealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealUser whereUserId($value)
 * @mixin \Eloquent
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|AppealUser whereDeletedAt($value)
 */
	class AppealUser extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * Modules\Layout\Entities\Tenant\LayoutArticle
 *
 * @property int $id
 * @property int $active
 * @property int $order
 * @property string $title
 * @property string $intro
 * @property string $text
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereIntro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $country_code
 * @property-read \Modules\Lk\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\Lk\Entities\Content|null $en
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\ArticleReactionUser> $reactions
 * @property-read int|null $reactions_count
 * @property-read \Modules\Lk\Entities\Content|null $ru
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCountryCode($value)
 */
	class Article extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * Modules\Lk\Entities\ArticleReaction
 *
 * @property int $id
 * @property int $active
 * @property int $order
 * @property string $title
 * @property string $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReaction whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReaction whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReaction whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReaction whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReaction whereUpdatedAt($value)
 */
	class ArticleReaction extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * Modules\Layout\Entities\Tenant\LayoutArticleReactionUser
 *
 * @property int $id
 * @property int $user_id
 * @property int $reaction_id
 * @property int $article_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser whereReactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser whereUserId($value)
 * @mixin \Eloquent
 */
	class ArticleReactionUser extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * Modules\Layout\Entities\Tenant\LayoutBonusAnnounce
 *
 * @property int $id
 * @property int $active
 * @property int $order
 * @property int $bonus_section_id
 * @property string $title
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce query()
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce whereBonusSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $country_code
 * @property-read \Modules\Lk\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\Lk\Entities\Content|null $en
 * @property-read \Modules\Lk\Entities\Content|null $ru
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce whereCountryCode($value)
 */
	class BonusAnnounce extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * Modules\Layout\Entities\Tenant\LayoutBonusSection
 *
 * @property int $id
 * @property int $active
 * @property int $order
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BonusSection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BonusSection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BonusSection query()
 * @method static \Illuminate\Database\Eloquent\Builder|BonusSection whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusSection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusSection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusSection whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusSection whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusSection whereUpdatedAt($value)
 * @property int $is_general
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Layout\Entities\Tenant\TenantBonusAnnounce> $announces
 * @property-read int|null $announces_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Layout\Entities\Tenant\TenantBonusText> $texts
 * @property-read int|null $texts_count
 * @method static \Illuminate\Database\Eloquent\Builder|BonusSection whereIsGeneral($value)
 * @mixin \Eloquent
 * @property-read \Modules\Lk\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\Lk\Entities\Content|null $en
 * @property-read \Modules\Lk\Entities\Content|null $ru
 */
	class BonusSection extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * Modules\Layout\Entities\Tenant\LayoutBonusText
 *
 * @property int $id
 * @property int $active
 * @property int $order
 * @property int $bonus_section_id
 * @property string $title
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText query()
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText whereBonusSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $country_code
 * @property-read \Modules\Lk\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\Lk\Entities\Content|null $en
 * @property-read \Modules\Lk\Entities\Content|null $ru
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText whereCountryCode($value)
 */
	class BonusText extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * Modules\Lk\Entities\Chat
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $icon
 * @property int|null $is_group
 * @property string|null $delivered_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read \Modules\Lk\Entities\ChatBitrix|null $bitrix
 * @property-read \Modules\Lk\Entities\ChatMessage|null $last
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\ChatMessage> $messages
 * @property-read int|null $messages_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\User> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereDeliveredAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereIsGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereUpdatedAt($value)
 */
	class Chat extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * App\Services\TenantAccount\Models\AppealBitrix
 *
 * @property-read \Modules\Lk\Entities\Appeal|null $appeal
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix query()
 * @property int $id
 * @property int $chat_id
 * @property int|null $bx_user_id
 * @property string|null $bx_chat_id
 * @property string|null $bx_chat_uid
 * @property int|null $bx_deal_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Lk\Entities\Chat|null $chat
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix whereBxChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix whereBxChatUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix whereBxDealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix whereBxUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ChatBitrix extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * Modules\Lk\Entities\ChatFile
 *
 * @property int $id
 * @property int $chat_id
 * @property int $message_id
 * @property string|null $path
 * @property string|null $filename
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ChatFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatFile query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatFile whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatFile whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatFile whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatFile wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatFile whereUpdatedAt($value)
 */
	class ChatFile extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * App\Services\TenantAccount\Models\ChatMessage
 *
 * @property int $id
 * @property int|null $chat_id
 * @property int|null $user_id
 * @property string|null $message
 * @property int $read
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereUserId($value)
 * @mixin \Eloquent
 * @property string|null $delivered_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\ChatFile> $files
 * @property-read int|null $files_count
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereDeliveredAt($value)
 */
	class ChatMessage extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * App\Services\TenantAccount\Models\ChatUser
 *
 * @property int $id
 * @property int|null $chat_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser whereUserId($value)
 * @mixin \Eloquent
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser whereDeletedAt($value)
 */
	class ChatUser extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * Modules\Lk\Entities\Content
 *
 * @property int $id
 * @property int $parent_id
 * @property string $locale
 * @property string $model
 * @property string|null $title
 * @property string|null $intro
 * @property string|null $text
 * @property string|null $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Content newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Content newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Content query()
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereIntro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereUpdatedAt($value)
 */
	class Content extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * App\Services\TenantAccount\Models\Settings
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $description
 * @property array|null $settings
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $default_file_type
 * @property-read mixed $file
 * @method static \Illuminate\Database\Eloquent\Builder|Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Document query()
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Document withoutTrashed()
 * @mixin \Eloquent
 * @property int $active
 * @property int $order
 * @property-read \Modules\Lk\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\Lk\Entities\Content|null $en
 * @property-read \Modules\Lk\Entities\Content|null $ru
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereOrder($value)
 */
	class Document extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * App\Services\TenantAccount\Models\Faq
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\FaqArticle> $articles
 * @property-read int|null $articles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq query()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $deleted_at
 * @property-read \Modules\Lk\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\Lk\Entities\Content|null $en
 * @property-read \Modules\Lk\Entities\Content|null $ru
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereDeletedAt($value)
 */
	class Faq extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * App\Services\TenantAccount\Models\FaqArticle
 *
 * @property int $id
 * @property int $faq_id
 * @property int $order
 * @property int $active
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle query()
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereFaqId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereUpdatedAt($value)
 * @property-read \Modules\Lk\Entities\Faq|null $faq
 * @mixin \Eloquent
 * @property string|null $deleted_at
 * @property-read \Modules\Lk\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\Lk\Entities\Content|null $en
 * @property-read \Modules\Lk\Entities\Content|null $ru
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereDeletedAt($value)
 */
	class FaqArticle extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * Modules\Lk\Entities\File
 *
 * @property int $id
 * @property int $model_id
 * @property string $model_type
 * @property string|null $type
 * @property string|null $name
 * @property string|null $title
 * @property string|null $path
 * @property string|null $key
 * @property string $disk
 * @property string|null $checksum
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property mixed $base64
 * @property mixed $contents
 * @property-read mixed $link
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 * @method static \Illuminate\Database\Eloquent\Builder|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File query()
 * @method static \Illuminate\Database\Eloquent\Builder|File whereChecksum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUrl($value)
 */
	class File extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * Modules\Lk\Entities\Payment
 *
 * @property int $id
 * @property int $purpose_id
 * @property int $status_id
 * @property int $amount
 * @property string|null $description
 * @property string|null $deadline
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Lk\Entities\PaymentPurpose|null $purpose
 * @property-read \Modules\Lk\Entities\PaymentStatus|null $status
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment query()
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereAmount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDeadline($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePurposeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereStatusId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Payment whereUpdatedAt($value)
 * @property string|null $payed_at
 * @method static \Illuminate\Database\Eloquent\Builder|Payment wherePayedAt($value)
 * @mixin \Eloquent
 */
	class Payment extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * Modules\Lk\EntitiesPaymentPurpose
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property string $title
 * @property string $color
 * @property string $bg
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose whereBg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose whereUpdatedAt($value)
 * @property string|null $icon_filter
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose whereIconFilter($value)
 * @mixin \Eloquent
 * @property string|null $type
 * @property int $is_hidden
 * @property-read \Modules\Lk\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\Lk\Entities\Content|null $en
 * @property-read \Modules\Lk\Entities\Content|null $ru
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose whereIsHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentPurpose whereType($value)
 */
	class PaymentPurpose extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * Modules\Lk\Entities\PaymentStatus
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaymentStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class PaymentStatus extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * Modules\Lk\Entities\Translation
 *
 * @property int $id
 * @property string $page
 * @property string $description
 * @property array $translation
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\Lk\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\Lk\Entities\Content|null $en
 * @property-read \Modules\Lk\Entities\Content|null $ru
 * @method static \Illuminate\Database\Eloquent\Builder|Translation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Translation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Translation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Translation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation wherePage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereTranslation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Translation withoutTrashed()
 */
	class Translation extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * Modules\Lk\Entities\User
 *
 * @property int $id
 * @property string|null $country_code
 * @property int|null $bx_id
 * @property string|null $locale
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $delete_reason
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Modules\Lk\Entities\UserAttributes|null $attributes
 * @property-read \Modules\Lk\Entities\File|null $avatar
 * @property-read \Modules\Lk\Entities\UserChatAttributes|null $chatAttributes
 * @property-read mixed $default_file_type
 * @property-read mixed $file
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeleteReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * Modules\Lk\Entities\UserAttributes
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $position_id
 * @property string|null $phone
 * @property int|null $phone_verified
 * @property string|null $last_name Фамилия
 * @property string|null $surname Отчество
 * @property string|null $about
 * @property \Illuminate\Support\Carbon|null $bod Дата рождения
 * @property string|null $job
 * @property array|null $interests
 * @property string|null $telegram
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $vkontakte
 * @property int|null $save_data
 * @property int|null $location
 * @property int|null $test_user
 * @property int|null $bonus
 * @property bool|null $cleaning
 * @property bool|null $master
 * @property bool|null $email_notification
 * @property bool|null $sms_notification
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Modules\Lk\Entities\UserPosition|null $position
 * @property-read \Modules\Lk\Entities\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereBod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereBonus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereCleaning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereEmailNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereInterests($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereJob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereMaster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes wherePhoneVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes wherePositionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereSaveData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereSmsNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereTelegram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereTestUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereVkontakte($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes withoutTrashed()
 */
	class UserAttributes extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * App\Models\UserChatAttributes
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $img
 * @property string|null $bx_chat_user_id
 * @property string|null $bx_personal_user_id
 * @property string|null $title
 * @property string|null $initials
 * @property string|null $color
 * @property string|null $bg
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereBg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereBxChatUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereInitials($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereUserId($value)
 * @mixin \Eloquent
 * @property int|null $bx_private_chat_id
 * @property int|null $bx_group_chat_id
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereBxGroupChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereBxPrivateChatId($value)
 */
	class UserChatAttributes extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * App\Services\Layout\Models\UserDeleteReason
 *
 * @property int $id
 * @property int $active
 * @property int $order
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserDeleteReason newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDeleteReason newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDeleteReason query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDeleteReason whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDeleteReason whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDeleteReason whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDeleteReason whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDeleteReason whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDeleteReason whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Modules\Lk\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\Lk\Entities\Content|null $en
 * @property-read \Modules\Lk\Entities\Content|null $ru
 */
	class UserDeleteReason extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * App\Services\Layout\Models\UserInterest
 *
 * @property int $id
 * @property int $active
 * @property int $order
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserInterest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserInterest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserInterest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserInterest whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserInterest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserInterest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserInterest whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserInterest whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserInterest whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Modules\Lk\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\Lk\Entities\Content|null $en
 * @property-read \Modules\Lk\Entities\Content|null $ru
 */
	class UserInterest extends \Eloquent {}
}

namespace Modules\Lk\Entities{
/**
 * App\Services\Layout\Models\UserPosition
 *
 * @property int $id
 * @property int|null $active
 * @property int $order
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Modules\Lk\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\Lk\Entities\Content|null $en
 * @property-read \Modules\Lk\Entities\Content|null $ru
 */
	class UserPosition extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities;
 *
 * @property int $id
 * @property int $theme_id
 * @property int $type_id
 * @property int $status_id
 * @property string $lastMessage
 * @property int $active
 * @property int $score
 * @property \Illuminate\Support\Carbon|null $delivered_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\AppealMessage> $messages
 * @property-read int|null $messages_count
 * @property-read \Modules\My\Entities\AppealStatus|null $status
 * @property-read \Modules\My\Entities\AppealTheme|null $theme
 * @property-read \Modules\My\Entities\AppealThemeType|null $themeType
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $users
 * @property-read int|null $users_count
 * @method static Builder|Appeal newModelQuery()
 * @method static Builder|Appeal newQuery()
 * @method static Builder|Appeal query()
 * @method static Builder|Appeal whereActive($value)
 * @method static Builder|Appeal whereCreatedAt($value)
 * @method static Builder|Appeal whereId($value)
 * @method static Builder|Appeal whereLastMessage($value)
 * @method static Builder|Appeal whereStatusId($value)
 * @method static Builder|Appeal whereThemeId($value)
 * @method static Builder|Appeal whereTypeId($value)
 * @method static Builder|Appeal whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\AppealUser> $appealUsers
 * @property-read int|null $appeal_users_count
 * @property-read \Modules\My\Entities\AppealBitrix|null $bitrix
 * @mixin \Eloquent
 * @property string|null $deleted_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|Appeal whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Appeal whereScore($value)
 */
	class Appeal extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * App\Services\TenantAccount\Models\AppealBitrix
 *
 * @property-read \Modules\My\Entities\Appeal|null $appeal
 * @method static \Illuminate\Database\Eloquent\Builder|AppealBitrix newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealBitrix newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealBitrix query()
 * @property int $id
 * @property int $appeal_id
 * @property int|null $bx_user_id
 * @property string|null $bx_chat_uid
 * @property int|null $bx_deal_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AppealBitrix whereAppealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealBitrix whereBxChatUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealBitrix whereBxDealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealBitrix whereBxUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealBitrix whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealBitrix whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealBitrix whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class AppealBitrix extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\AppealFile
 *
 * @property int $id
 * @property int $appeal_id
 * @property int $message_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $path
 * @property string|null $filename
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile whereAppealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealFile whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class AppealFile extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * App\Services\TenantAccount\Models\LayoutAppealMessage
 *
 * @property int $id
 * @property int $support_id
 * @property int $author_id
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $appeal_id
 * @property-read int|null $files_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\AppealFile> $files
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereAppealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\AppealFile> $files
 * @property int|null $bx_chat_id
 * @property int|null $bx_message_id
 * @property int|null $read
 * @property string|null $delivered_at
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereBxChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereBxMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereDeliveredAt($value)
 * @mixin \Eloquent
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|AppealMessage whereDeletedAt($value)
 */
	class AppealMessage extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\Layout\Entities\Tenant\LayoutAppealStatus
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $color
 * @property string $bg
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus whereBg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Modules\My\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\My\Entities\Content|null $en
 * @property-read \Modules\My\Entities\Content|null $ru
 */
	class AppealStatus extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * App\Services\TenantAccount\Models\AppealTheme
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\AppealThemeType> $types
 * @property-read int|null $types_count
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $country_code
 * @property int|null $priority_id
 * @property string|null $deleted_at
 * @property-read \Modules\My\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\My\Entities\Content|null $en
 * @property-read \Modules\My\Entities\AppealThemePriority|null $priority
 * @property-read \Modules\My\Entities\Content|null $ru
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme wherePriorityId($value)
 */
	class AppealTheme extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\AppealThemePriority
 *
 * @property int $id
 * @property string $title
 * @property int|null $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemePriority newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemePriority newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemePriority query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemePriority whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemePriority whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemePriority whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemePriority whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemePriority whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemePriority whereUpdatedAt($value)
 */
	class AppealThemePriority extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * App\Services\TenantAccount\Models\AppealThemeType
 *
 * @property int $id
 * @property int $theme_id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType whereThemeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType whereUpdatedAt($value)
 * @property-read \Modules\My\Entities\AppealTheme|null $theme
 * @mixin \Eloquent
 * @property string|null $country_code
 * @property int|null $priority_id
 * @property-read \Modules\My\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\My\Entities\Content|null $en
 * @property-read \Modules\My\Entities\AppealThemePriority|null $priority
 * @property-read \Modules\My\Entities\Content|null $ru
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType wherePriorityId($value)
 */
	class AppealThemeType extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * App\Services\TenantAccount\Models\AppealUser
 *
 * @property int $id
 * @property int|null $appeal_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AppealUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealUser whereAppealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealUser whereUserId($value)
 * @mixin \Eloquent
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|AppealUser whereDeletedAt($value)
 */
	class AppealUser extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\Article
 *
 * @property int $id
 * @property string|null $country_code
 * @property int $active
 * @property int $order
 * @property string|null $title
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\My\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\My\Entities\Content|null $en
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\ArticleReactionUser> $reactions
 * @property-read int|null $reactions_count
 * @property-read \Modules\My\Entities\Content|null $ru
 * @method static \Illuminate\Database\Eloquent\Builder|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUpdatedAt($value)
 */
	class Article extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\ArticleReaction
 *
 * @property int $id
 * @property int $active
 * @property int $order
 * @property string $title
 * @property string $icon
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReaction newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReaction newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReaction query()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReaction whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReaction whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReaction whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReaction whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReaction whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReaction whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReaction whereUpdatedAt($value)
 */
	class ArticleReaction extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\ArticleReactionUser
 *
 * @property int $id
 * @property int $user_id
 * @property int $reaction_id
 * @property int $article_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser whereReactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser whereUserId($value)
 */
	class ArticleReactionUser extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * App\Services\TenantAccount\Models\Chat
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $icon
 * @property boolean|null $is_group
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $delivered_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $users
 * @property-read \Illuminate\Database\Eloquent\Collection<int, ChatBitrix> $bitrix
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereIsGroup($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereDeliveredAt($value)
 * @mixin \Eloquent
 * @property string|null $deleted_at
 * @property-read \Modules\My\Entities\ChatMessage|null $last
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\ChatMessage> $messages
 * @property-read int|null $messages_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|Chat whereDeletedAt($value)
 */
	class Chat extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * App\Services\TenantAccount\Models\AppealBitrix
 *
 * @property-read \Modules\My\Entities\Appeal|null $appeal
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix query()
 * @property int $id
 * @property int $chat_id
 * @property int|null $bx_user_id
 * @property string|null $bx_chat_id
 * @property string|null $bx_chat_uid
 * @property int|null $bx_deal_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\My\Entities\Chat|null $chat
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix whereBxChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix whereBxChatUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix whereBxDealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix whereBxUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatBitrix whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class ChatBitrix extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\ChatFile
 *
 * @property int $id
 * @property int $chat_id
 * @property int $message_id
 * @property string|null $path
 * @property string|null $filename
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ChatFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatFile query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatFile whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatFile whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatFile whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatFile wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatFile whereUpdatedAt($value)
 */
	class ChatFile extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\ChatMessage
 *
 * @property int $id
 * @property int|null $chat_id
 * @property int|null $user_id
 * @property string|null $message
 * @property int $read
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereUserId($value)
 * @mixin \Eloquent
 * @property string|null $delivered_at
 * @property string|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\ChatFile> $files
 * @property-read int|null $files_count
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatMessage whereDeliveredAt($value)
 */
	class ChatMessage extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\ChatUser
 *
 * @property int $id
 * @property int|null $chat_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser whereChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser whereUserId($value)
 * @mixin \Eloquent
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|ChatUser whereDeletedAt($value)
 */
	class ChatUser extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\Contact
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property string $user_id
 * @property string $name
 * @property string $phone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact query()
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Contact whereUserId($value)
 */
	class Contact extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\Content
 *
 * @property int $id
 * @property int|null $parent_id
 * @property string|null $locale
 * @property string|null $model
 * @property string|null $title
 * @property string|null $intro
 * @property string|null $text
 * @property string|null $file
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Content newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Content newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Content query()
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereIntro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereModel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereParentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Content whereUpdatedAt($value)
 */
	class Content extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * App\Services\TenantAccount\Models\Settings
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $slug
 * @property string|null $description
 * @property array|null $settings
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read mixed $default_file_type
 * @property-read mixed $file
 * @method static \Illuminate\Database\Eloquent\Builder|Document newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Document onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Document query()
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereSettings($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Document withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Document withoutTrashed()
 * @mixin \Eloquent
 * @property-read \Modules\My\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\My\Entities\Content|null $en
 * @property-read \Modules\My\Entities\Content|null $ru
 */
	class Document extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\Expense
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property string $slug
 * @property string $color
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\My\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\My\Entities\Content|null $en
 * @property-read \Modules\My\Entities\Content|null $ru
 * @method static \Illuminate\Database\Eloquent\Builder|Expense newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense query()
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Expense whereUpdatedAt($value)
 */
	class Expense extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * App\Services\TenantAccount\Models\Faq
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\FaqArticle> $articles
 * @property-read int|null $articles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq query()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string|null $country_code
 * @property string|null $deleted_at
 * @property-read \Modules\My\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\My\Entities\Content|null $en
 * @property-read \Modules\My\Entities\Content|null $ru
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereDeletedAt($value)
 */
	class Faq extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * App\Services\TenantAccount\Models\FaqArticle
 *
 * @property int $id
 * @property int $faq_id
 * @property int $order
 * @property int $active
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle query()
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereFaqId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereUpdatedAt($value)
 * @property-read \Modules\My\Entities\Faq|null $faq
 * @mixin \Eloquent
 * @property string|null $country_code
 * @property string|null $deleted_at
 * @property-read \Modules\My\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\My\Entities\Content|null $en
 * @property-read \Modules\My\Entities\Content|null $ru
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereDeletedAt($value)
 */
	class FaqArticle extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\File
 *
 * @property int $id
 * @property int $model_id
 * @property string $model_type
 * @property string|null $type
 * @property string|null $name
 * @property string|null $title
 * @property string|null $path
 * @property string|null $key
 * @property string $disk
 * @property string|null $checksum
 * @property string|null $url
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property mixed $base64
 * @property mixed $contents
 * @property-read mixed $link
 * @property-read \Illuminate\Database\Eloquent\Model|\Eloquent $model
 * @method static \Illuminate\Database\Eloquent\Builder|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File query()
 * @method static \Illuminate\Database\Eloquent\Builder|File whereChecksum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereDisk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUrl($value)
 */
	class File extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\Request
 *
 * @property int $id
 * @property int $theme_id
 * @property int $status_id
 * @property string $lastMessage
 * @property int $active
 * @property int $score
 * @property \Illuminate\Support\Carbon|null $delivered_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\RequestMessage> $messages
 * @property-read int|null $messages_count
 * @property-read \Modules\My\Entities\AppealStatus|null $status
 * @property-read \Modules\My\Entities\RequestTheme|null $theme
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $users
 * @property-read int|null $users_count
 * @method static Builder|Request newModelQuery()
 * @method static Builder|Request newQuery()
 * @method static Builder|Request query()
 * @method static Builder|Request whereActive($value)
 * @method static Builder|Request whereCreatedAt($value)
 * @method static Builder|Request whereId($value)
 * @method static Builder|Request whereLastMessage($value)
 * @method static Builder|Request whereStatusId($value)
 * @method static Builder|Request whereThemeId($value)
 * @method static Builder|Request whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\RequestUser> $RequestUsers
 * @property-read int|null $Request_users_count
 * @property-read \Modules\My\Entities\RequestBitrix|null $bitrix
 * @mixin \Eloquent
 * @property string|null $deleted_at
 * @property-read int|null $request_users_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Request whereScore($value)
 */
	class Request extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * App\Services\TenantAccount\Models\RequestBitrix
 *
 * @property-read \Modules\My\Entities\Appeal|null $request
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBitrix newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBitrix newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBitrix query()
 * @property int $id
 * @property int $request_id
 * @property int|null $bx_user_id
 * @property string|null $bx_chat_uid
 * @property int|null $bx_deal_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBitrix whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBitrix whereBxChatUid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBitrix whereBxDealId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBitrix whereBxUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBitrix whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBitrix whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestBitrix whereUpdatedAt($value)
 * @mixin \Eloquent
 */
	class RequestBitrix extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\RequestFile
 *
 * @property int $id
 * @property int $request_id
 * @property int $message_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $path
 * @property string|null $filename
 * @method static \Illuminate\Database\Eloquent\Builder|RequestFile newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestFile newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestFile query()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestFile whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestFile whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestFile whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestFile whereMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestFile wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestFile whereFilename($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestFile whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $appeal_id
 * @method static \Illuminate\Database\Eloquent\Builder|RequestFile whereAppealId($value)
 */
	class RequestFile extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * App\Services\TenantAccount\Models\LayoutRequestMessage
 *
 * @property int $id
 * @property int $support_id
 * @property int $author_id
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $request_id
 * @property-read int|null $files_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\RequestFile> $files
 * @method static \Illuminate\Database\Eloquent\Builder|RequestMessage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestMessage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestMessage query()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestMessage whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestMessage whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestMessage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestMessage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestMessage whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestMessage whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\RequestFile> $files
 * @property int|null $bx_chat_id
 * @property int|null $bx_message_id
 * @property int|null $read
 * @property string|null $delivered_at
 * @method static \Illuminate\Database\Eloquent\Builder|RequestMessage whereBxChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestMessage whereBxMessageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestMessage whereRead($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestMessage whereDeliveredAt($value)
 * @mixin \Eloquent
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|RequestMessage whereDeletedAt($value)
 */
	class RequestMessage extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\RequestTheme
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $types_count
 * @method static \Illuminate\Database\Eloquent\Builder|RequestTheme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestTheme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestTheme query()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestTheme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestTheme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestTheme whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestTheme whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property int|null $priority_id
 * @property string|null $deleted_at
 * @property-read \Modules\My\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\My\Entities\Content|null $en
 * @property-read \Modules\My\Entities\AppealThemePriority|null $priority
 * @property-read \Modules\My\Entities\Content|null $ru
 * @method static \Illuminate\Database\Eloquent\Builder|RequestTheme whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestTheme wherePriorityId($value)
 */
	class RequestTheme extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\RequestUser
 *
 * @property int $id
 * @property int|null $request_id
 * @property int|null $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|RequestUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestUser whereRequestId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestUser whereUserId($value)
 * @mixin \Eloquent
 * @property string|null $deleted_at
 * @method static \Illuminate\Database\Eloquent\Builder|RequestUser whereDeletedAt($value)
 */
	class RequestUser extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\Translation
 *
 * @property int $id
 * @property string $page
 * @property string $description
 * @property array $translation
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\My\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\My\Entities\Content|null $en
 * @property-read \Modules\My\Entities\Content|null $ru
 * @method static \Illuminate\Database\Eloquent\Builder|Translation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Translation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Translation onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Translation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation wherePage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereTranslation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Translation withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Translation withoutTrashed()
 */
	class Translation extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\User
 *
 * @property int $id
 * @property int|null $bx_id
 * @property string|null $country_code
 * @property string|null $locale
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $delete_reason
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Modules\My\Entities\UserAttributes|null $attributes
 * @property-read \Modules\My\Entities\File|null $avatar
 * @property-read \Modules\My\Entities\UserChatAttributes|null $chatAttributes
 * @property-read \Modules\My\Entities\Contact|null $contact
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\Contact> $contacts
 * @property-read int|null $contacts_count
 * @property-read mixed $default_file_type
 * @property-read mixed $file
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBxId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeleteReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLocale($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutRole($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User withoutTrashed()
 */
	class User extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\UserAttributes
 *
 * @property int $id
 * @property int $user_id
 * @property int|null $position_id
 * @property string|null $phone
 * @property int|null $phone_verified
 * @property string|null $phone_sub
 * @property string|null $last_name Фамилия
 * @property string|null $surname Отчество
 * @property string|null $about
 * @property \Illuminate\Support\Carbon|null $bod Дата рождения
 * @property string|null $job
 * @property array|null $interests
 * @property string|null $telegram
 * @property string|null $facebook
 * @property string|null $instagram
 * @property string|null $vkontakte
 * @property int|null $save_data
 * @property int|null $location
 * @property int|null $test_user
 * @property int|null $bonus
 * @property int|null $cleaning
 * @property int|null $master
 * @property int|null $email_notification
 * @property int|null $sms_notification
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Modules\My\Entities\UserPosition|null $position
 * @property-read \Modules\My\Entities\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereBod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereBonus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereCleaning($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereEmailNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereInstagram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereInterests($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereJob($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereLocation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereMaster($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes wherePhoneSub($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes wherePhoneVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes wherePositionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereSaveData($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereSmsNotification($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereTelegram($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereTestUser($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes whereVkontakte($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|UserAttributes withoutTrashed()
 */
	class UserAttributes extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * App\Models\UserChatAttributes
 *
 * @property int $id
 * @property int $user_id
 * @property string|null $img
 * @property string|null $bx_chat_user_id
 * @property string|null $bx_personal_user_id
 * @property string|null $title
 * @property string|null $initials
 * @property string|null $color
 * @property string|null $bg
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereBg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereBxChatUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereInitials($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereUserId($value)
 * @mixin \Eloquent
 * @property int|null $bx_private_chat_id
 * @property int|null $bx_group_chat_id
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereBxGroupChatId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserChatAttributes whereBxPrivateChatId($value)
 */
	class UserChatAttributes extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * App\Services\Layout\Models\UserDeleteReason
 *
 * @property int $id
 * @property int $active
 * @property int $order
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserDeleteReason newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDeleteReason newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDeleteReason query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserDeleteReason whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDeleteReason whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDeleteReason whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDeleteReason whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDeleteReason whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserDeleteReason whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Modules\My\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\My\Entities\Content|null $en
 * @property-read \Modules\My\Entities\Content|null $ru
 */
	class UserDeleteReason extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * App\Services\Layout\Models\UserPosition
 *
 * @property int $id
 * @property int|null $active
 * @property int $order
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read \Modules\My\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\My\Entities\Content|null $en
 * @property-read \Modules\My\Entities\Content|null $ru
 */
	class UserPosition extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\WorkLayout
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property string $code
 * @property string $title
 * @property string $view
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\My\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\My\Entities\Content|null $en
 * @property-read \Modules\My\Entities\Content|null $ru
 * @method static \Illuminate\Database\Eloquent\Builder|WorkLayout newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkLayout newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkLayout query()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkLayout whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkLayout whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkLayout whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkLayout whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkLayout whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkLayout whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkLayout whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkLayout whereView($value)
 */
	class WorkLayout extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\WorkModel
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property string $code
 * @property string $title
 * @property string $view
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Modules\My\Entities\Content|null $content
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\Content> $contentAdmin
 * @property-read int|null $content_admin_count
 * @property-read \Modules\My\Entities\Content|null $en
 * @property-read \Modules\My\Entities\Content|null $ru
 * @method static \Illuminate\Database\Eloquent\Builder|WorkModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|WorkModel whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkModel whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkModel whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkModel whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkModel whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|WorkModel whereView($value)
 */
	class WorkModel extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\XCookie
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $value
 * @property \Illuminate\Support\Collection|null $json
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|XCookie newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|XCookie newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|XCookie query()
 * @method static \Illuminate\Database\Eloquent\Builder|XCookie whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XCookie whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XCookie whereJson($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XCookie whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XCookie whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XCookie whereValue($value)
 */
	class XCookie extends \Eloquent {}
}

namespace Modules\My\Entities{
/**
 * Modules\My\Entities\XUser
 *
 * @property int $id
 * @property string|null $LastName
 * @property string|null $FirstName
 * @property string|null $FatherName
 * @property string|null $DateOfBirth
 * @property string|null $Phone
 * @property string|null $Login
 * @property string|null $Email
 * @property string|null $Gender
 * @property string|null $PasportNum
 * @property string|null $PasportCode
 * @property string|null $PasportOtd
 * @property string|null $PasportDate
 * @property string|null $Address
 * @property string|null $Country
 * @property string|null $Region
 * @property string|null $City
 * @property string|null $Street
 * @property string|null $House
 * @property string|null $Apartment
 * @property string|null $bankCorr
 * @property string|null $bankBIK
 * @property string|null $bankINN
 * @property string|null $bankKPP
 * @property string|null $bankNum
 * @property string|null $bankClient
 * @property string|null $bankCard
 * @property string|null $bankDate
 * @property string|null $bankCVC
 * @property string|null $Avatar
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|XUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|XUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|XUser onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|XUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereApartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereBankBIK($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereBankCVC($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereBankCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereBankClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereBankCorr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereBankDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereBankINN($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereBankKPP($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereBankNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereDateOfBirth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereFatherName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereGender($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereHouse($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereLogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser wherePasportCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser wherePasportDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser wherePasportNum($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser wherePasportOtd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser wherePhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereRegion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereStreet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|XUser withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|XUser withoutTrashed()
 */
	class XUser extends \Eloquent {}
}

