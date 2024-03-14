<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

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
class BitrixApartmentChat extends Model
{
    use HasFactory;

    protected $connection = 'bitrix';

    protected $table = "apartment_chats";

    protected $fillable = [
           "bx_apartment_id", "bx_chat_uid", "bx_chat_id", "bx_user_id", "bx_chat_user_id"
        ];

    public $timestamps = false;

    public function contacts(): HasManyThrough
    {
        return $this->hasManyThrough(
            BitrixCrmContact::class,
            "apartment_chat_users",
            "bx_id",
            "bx_user_id"
        );
    }

    public function users(): HasMany
    {
        return $this->hasMany(
            BitrixApartmentChatUser::class,
            "bx_apartment_id",
            "bx_apartment_id",
        );
    }
}
