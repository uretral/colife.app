<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Lk\Traits\HasTranslation;

/**
 * App\Services\Layout\Models\UserPosition
 *
 * @property int $id
 * @property int|null $active
 * @property int $order
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserPosition whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UserPosition extends Model
{
    use HasFactory;
    use HasTranslation;

    protected $connection = 'tenant';
    protected $guarded = [];
    public static $snakeAttributes = false;
    protected $with = ['content'];
}
