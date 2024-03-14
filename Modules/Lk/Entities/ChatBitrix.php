<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


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
class ChatBitrix extends Model
{
    use HasFactory;

    protected     $connection      = 'tenant';
    protected     $table           = 'chat_bitrix';
    protected     $guarded         = [];
    public static $snakeAttributes = false;

    protected $fillable = [];

    public function chat(): BelongsTo
    {
        return $this->belongsTo(Chat::class);
    }

}
