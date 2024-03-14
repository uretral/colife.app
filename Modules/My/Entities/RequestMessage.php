<?php

namespace Modules\My\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


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
 */
class RequestMessage extends Model
{
    use HasFactory;

    protected     $connection      = 'my';
    protected     $guarded         = [];
    public static $snakeAttributes = false;
    protected     $with            = ['files'];

    protected $fillable = ["author_id", "request_id", "message", "bx_chat_id", "bx_message_id", "delivered_at",'read'];

    public function files(): HasMany
    {
        return $this->hasMany(RequestFile::class, 'message_id', 'id');
    }
}
