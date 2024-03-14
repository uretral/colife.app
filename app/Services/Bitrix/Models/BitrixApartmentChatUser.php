<?php

namespace App\Services\Bitrix\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

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
class BitrixApartmentChatUser extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = 'bitrix';
    protected $table = "apartment_chat_users";

    protected $fillable = [
            "bx_apartment_id", "bx_user_id", "created_at","updated_at", "deleted_at",
        ];

    public function apartment(): BelongsTo
    {
        return $this->belongsTo(BitrixApartmentChat::class,"bx_apartment_id","id");
    }

    public function user(): HasMany
    {
        return $this->hasMany(BitrixCrmContact::class,"bx_id","bx_user_id");
    }
}
