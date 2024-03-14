<?php

namespace Modules\My\Traits;

use Encore\Admin\Grid;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\My\Entities\Content;

trait HasTranslation
{
    public function content(): HasOne
    {
        return $this->hasOne(Content::class, 'parent_id', 'id')
            ->where('locale', \App::currentLocale())
            ->where('model', self::class);
    }

    public function contentAdmin(): HasMany
    {
        return $this->hasMany(Content::class, 'parent_id', 'id')
            ->where('model', self::class);
    }

    public function ru(): HasOne
    {
        return $this->hasOne(Content::class, 'parent_id', 'id')
            ->where('locale', 'ru')
            ->where('model', self::class);
    }

    public function en(): HasOne
    {
        return $this->hasOne(Content::class, 'parent_id', 'id')
            ->where('locale', 'en')
            ->where('model', self::class);
    }

//    public function headline(): Attribute
//    {
//        return Attribute::make(
//            get: fn ($value, $attributes) => $this->content?->title
//        );
//    }
}
