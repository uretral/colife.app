<?php

namespace Modules\My\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\My\Traits\HasTranslation;

class Translation extends Model
{
    use SoftDeletes, HasTranslation;

    protected $connection = 'my';
    protected $guarded = [];

    protected $casts = [
        'translation' => 'json'
    ];

    public function getTranslationAttribute($value): array
    {
        return array_values(json_decode($value, true) ?: []);
    }

    public function setTranslationAttribute($value)
    {
        $this->attributes['translation'] = json_encode(array_values($value));
    }
}
