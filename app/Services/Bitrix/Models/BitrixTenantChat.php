<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
class BitrixTenantChat extends Model
{
    use HasFactory;

    protected $connection = 'bitrix';

    protected $table = "tenant_chats";

    protected $fillable = [
          "bx_chat_uid", "bx_chat_id", "bx_user_id", "bx_chat_user_id"
        ];

    public $timestamps = false;

    public function contact(): HasOne
    {
        return $this->hasOne(
            BitrixCrmContact::class,
            "bx_id",
            "bx_user_id",
        );
    }
}
