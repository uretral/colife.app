<?php

namespace Modules\My\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\My\Traits\HasCountryCode;
use Modules\My\Traits\HasTranslation;

class Article extends Model
{
    use HasFactory, HasTranslation, HasCountryCode;

    protected $connection = 'my';
    protected $guarded = [];
    public static $snakeAttributes = false;
    protected $with = ['content'];

    public function reactions(): HasMany
    {
        return $this->hasMany(ArticleReactionUser::class, 'article_id', 'id');
    }


}
