<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Modules\Layout\Entities\Tenant\LayoutArticleReactionUser
 *
 * @property int $id
 * @property int $user_id
 * @property int $reaction_id
 * @property int $article_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser whereReactionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ArticleReactionUser whereUserId($value)
 * @mixin \Eloquent
 */
class ArticleReactionUser extends Model
{
    use HasFactory;

    protected $connection = 'tenant';
    protected $guarded = [];
    public static $snakeAttributes = false;
}
