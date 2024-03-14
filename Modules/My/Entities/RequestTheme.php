<?php

namespace Modules\My\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\My\Traits\HasTranslation;


/**
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read int|null $types_count
 * @method static \Illuminate\Database\Eloquent\Builder|RequestTheme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestTheme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestTheme query()
 * @method static \Illuminate\Database\Eloquent\Builder|RequestTheme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestTheme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestTheme whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RequestTheme whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class RequestTheme extends Model
{
    use HasFactory;
    use HasTranslation;

    protected     $connection      = 'my';
    protected     $guarded         = [];
    public static $snakeAttributes = false;
    protected     $with            = ['priority','content'];


    public function priority(): HasOne
    {
        return $this->hasOne(AppealThemePriority::class,'id','priority_id');
    }
}
