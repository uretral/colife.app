<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Lk\Traits\HasTranslation;

/**
 * Modules\Layout\Entities\Tenant\LayoutBonusText
 *
 * @property int $id
 * @property int $active
 * @property int $order
 * @property int $bonus_section_id
 * @property string $title
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText query()
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText whereBonusSectionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BonusText whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BonusText extends Model
{
    use HasFactory;
    use HasTranslation;

    protected $connection = 'tenant';
    protected $guarded = [];
    public static $snakeAttributes = false;
    protected $with = ['content'];
}
