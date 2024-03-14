<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Lk\Traits\HasTranslation;

/**
 * Modules\Layout\Entities\Tenant\LayoutBonusSection
 *
 * @property int $id
 * @property int $active
 * @property int $order
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BonusSection newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BonusSection newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BonusSection query()
 * @method static \Illuminate\Database\Eloquent\Builder|BonusSection whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusSection whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusSection whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusSection whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusSection whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusSection whereUpdatedAt($value)
 * @property int $is_general
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Layout\Entities\Tenant\TenantBonusAnnounce> $announces
 * @property-read int|null $announces_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Layout\Entities\Tenant\TenantBonusText> $texts
 * @property-read int|null $texts_count
 * @method static \Illuminate\Database\Eloquent\Builder|BonusSection whereIsGeneral($value)
 * @mixin \Eloquent
 */
class BonusSection extends Model
{
    use HasFactory;
    use HasTranslation;

    protected $connection = 'tenant';
    protected $guarded = [];
    public static $snakeAttributes = false;
    protected $with = ['announces','texts','content'];

    public function announces(): HasMany
    {
        return $this->hasMany(BonusAnnounce::class,'bonus_section_id','id');
    }

    public function texts(): HasMany
    {
        return $this->hasMany(BonusText::class,'bonus_section_id','id');
    }
}

