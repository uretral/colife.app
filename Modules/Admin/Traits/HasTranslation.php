<?php

namespace Modules\Admin\Traits;

use Encore\Admin\Form;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Modules\Admin\Entities\Translation;

trait HasTranslation
{
    public function ru(): HasOne
    {
        return $this->hasOne(Translation::class,'parent_id', 'id')
            ->where('locale', 'ru')
            ->where('model', self::class);
    }

    public function en(): HasOne
    {
        return $this->hasOne(Translation::class,'parent_id', 'id')
            ->where('locale', 'en')
            ->where('model', self::class);
    }

    public function trans(): HasOne
    {
        return $this->hasOne(Translation::class,'parent_id', 'id')
            ->where('locale', \App::currentLocale())
            ->where('model', self::class);
    }

    public function transAdmin(): HasMany
    {
        return $this->hasMany(Translation::class,'parent_id', 'id')
            ->where('model', self::class);
    }


}
