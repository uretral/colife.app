<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Lk\Traits\HasTranslation;

/**
 * App\Services\Layout\Models\UserInterest
 *
 * @property int $id
 * @property int $active
 * @property int $order
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|UserInterest newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserInterest newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserInterest query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserInterest whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserInterest whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserInterest whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserInterest whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserInterest whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserInterest whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UserInterest extends Model
{
    use HasFactory;
    use HasTranslation;

    protected $connection = 'tenant';
    protected $guarded = [];
    public static $snakeAttributes = false;
    protected $with = ['content'];
}
