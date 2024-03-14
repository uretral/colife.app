<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


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
class AppealBitrix extends Model
{
    use HasFactory;

    protected     $connection      = 'tenant';
    protected     $table           = 'appeal_bitrix';
    protected     $guarded         = [];
    public static $snakeAttributes = false;

    public function appeal(): BelongsTo
    {
        return $this->belongsTo(Appeal::class);
    }

}
