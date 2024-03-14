<?php

namespace Modules\My\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


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
class RequestBitrix extends Model
{
    use HasFactory;

    protected     $connection      = 'my';
    protected     $table           = 'request_bitrix';
    protected     $guarded         = [];
    public static $snakeAttributes = false;

    public function request(): BelongsTo
    {
        return $this->belongsTo(Request::class);
    }

}
