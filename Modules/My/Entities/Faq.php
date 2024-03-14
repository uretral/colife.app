<?php

namespace Modules\My\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\My\Traits\HasCountryCode;
use Modules\My\Traits\HasTranslation;


/**
 * App\Services\TenantAccount\Models\Faq
 *
 * @property int $id
 * @property int $order
 * @property int $active
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\FaqArticle> $articles
 * @property-read int|null $articles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq query()
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Faq whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Faq extends Model
{
    use HasFactory;
    use HasTranslation, HasCountryCode;

    protected     $connection      = 'my';
    protected     $guarded         = [];
    public static $snakeAttributes = false;

    protected $fillable = ['active'];
    protected $with = ['content'];

    public function articles(): HasMany
    {
        return $this->hasMany(FaqArticle::class, 'faq_id', 'id');
    }

}
