<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Lk\Traits\HasTranslation;

/**
 * Modules\Layout\Entities\Tenant\LayoutBonusAnnounce
 *
 * @property int $id
 * @property int $active
 * @property int $order
 * @property int $bonus_section_id
 * @property string $title
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce query()
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce whereBonusSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusAnnounce whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BonusAnnounce extends Model
{
    use HasFactory;
    use HasTranslation;

    protected $connection = 'tenant';
    protected $guarded = [];
    public static $snakeAttributes = false;
    protected $with = ['content'];
}
