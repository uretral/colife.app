<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Lk\Traits\HasTranslation;
use Modules\Lk\Traits\HasCountryCode;

/**
 * Modules\Layout\Entities\Tenant\LayoutArticle
 *
 * @property int $id
 * @property int $active
 * @property int $order
 * @property string $title
 * @property string $intro
 * @property string $text
 * @property string $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Article newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Article query()
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereIntro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Article whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Article extends Model
{
    use HasFactory;
    use HasTranslation, HasCountryCode;

    protected $connection = 'tenant';
    protected $guarded = [];
    public static $snakeAttributes = false;

    public function reactions(): HasMany
    {
        return $this->hasMany(ArticleReactionUser::class, 'article_id', 'id');
    }


}
