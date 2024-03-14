<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Lk\Traits\HasTranslation;

/**
 * Modules\Layout\Entities\Tenant\LayoutAppealStatus
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $color
 * @property string $bg
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus whereBg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus whereColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AppealStatus extends Model
{
    use HasFactory;
    use HasTranslation;

    protected     $connection      = 'tenant';
    protected     $guarded         = [];
    public static $snakeAttributes = false;
    protected $with = ['content'];
}
