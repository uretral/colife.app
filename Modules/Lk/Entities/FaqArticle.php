<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Modules\Lk\Traits\HasTranslation;


/**
 * App\Services\TenantAccount\Models\FaqArticle
 *
 * @property int $id
 * @property int $faq_id
 * @property int $order
 * @property int $active
 * @property string $title
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle query()
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereFaqId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FaqArticle whereUpdatedAt($value)
 * @property-read \Modules\Lk\Entities\Faq|null $faq
 * @mixin \Eloquent
 */
class FaqArticle extends Model
{
    use HasFactory;
    use HasTranslation;

    protected     $connection      = 'tenant';
    protected     $guarded         = [];
    public static $snakeAttributes = false;
    protected $with = ['content'];


    public function faq(): BelongsTo
    {
        return $this->belongsTo(Faq::class,);
    }
}
