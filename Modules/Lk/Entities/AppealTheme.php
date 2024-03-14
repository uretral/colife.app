<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Lk\Traits\HasTranslation;


/**
 * App\Services\TenantAccount\Models\AppealTheme
 *
 * @property int $id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\AppealThemeType> $types
 * @property-read int|null $types_count
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealTheme whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AppealTheme extends Model
{
    use HasFactory;
    use HasTranslation;

    protected     $connection      = 'tenant';
    protected     $guarded         = [];
    public static $snakeAttributes = false;
    protected     $with            = ['types','priority','content'];

    public function types(): HasMany
    {
        return $this->hasMany(AppealThemeType::class, 'theme_id', 'id');
    }

    public function priority(): HasOne
    {
        return $this->hasOne(AppealThemePriority::class,'id','priority_id');
    }
}
