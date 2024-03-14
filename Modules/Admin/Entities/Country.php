<?php

namespace Modules\Admin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Admin\Traits\HasTranslation;

class Country extends Model
{
    use HasFactory, HasTranslation;

    protected $fillable = [];

}
