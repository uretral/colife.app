<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Lk\Traits\HasTranslation;

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
 */
class UserDeleteReason extends Model
{
    use HasFactory;
    use HasTranslation;

    protected $connection = 'tenant';
    protected $guarded = [];
    public static $snakeAttributes = false;
    protected $with = ['content'];
}
