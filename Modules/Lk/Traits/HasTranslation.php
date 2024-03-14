<?php

namespace Modules\Lk\Traits;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Lk\Entities\Content;

trait HasTranslation
{
    public function content(): HasOne
    {
        return $this->hasOne(Content::class,'parent_id', 'id')
            ->where('locale', \App::currentLocale())
            ->where('model', self::class);
    }

    public function contentAdmin(): HasMany
    {
        return $this->hasMany(Content::class,'parent_id', 'id')
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
}
