<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


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
 */
class AppealUser extends Model
{
    use HasFactory;

    protected $connection = 'tenant';
    protected $guarded    = [];
    protected $fillable   = ["user_id", "appeal_id"];


}
