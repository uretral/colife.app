<?php

namespace Modules\My\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\My\Traits\HasCountryCode;
use Modules\My\Traits\HasTranslation;

/**
 * App\Services\TenantAccount\Models\AppealThemeType
 *
 * @property int $id
 * @property int $theme_id
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType query()
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType whereThemeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AppealThemeType whereUpdatedAt($value)
 * @property-read \Modules\My\Entities\AppealTheme|null $theme
 * @mixin \Eloquent
 */
class AppealThemeType extends Model
{
    use HasFactory;
    use HasTranslation, HasCountryCode;

    protected     $connection      = 'my';
    protected     $guarded         = [];
    public static $snakeAttributes = false;
    protected     $with            = ['priority','content'];

    public function theme(): BelongsTo
    {
        return $this->belongsTo(AppealTheme::class);
    }

    public function priority(): HasOne
    {
        return $this->hasOne(AppealThemePriority::class,'id','priority_id');
    }
}
