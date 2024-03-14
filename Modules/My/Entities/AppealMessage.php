<?php

namespace Modules\My\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


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
 */
class AppealMessage extends Model
{
    use HasFactory;

    protected     $connection      = 'my';
    protected     $guarded         = [];
    public static $snakeAttributes = false;
    protected     $with            = ['files'];

    protected $fillable = ["author_id", "appeal_id", "message", "bx_chat_id", "bx_message_id", "delivered_at",'read'];

    public function files(): HasMany
    {
        return $this->hasMany(AppealFile::class, 'message_id', 'id');
    }
}
