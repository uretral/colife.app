<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Modules\Lk\Traits\HasCountryCode;
use Modules\Lk\Traits\HasTranslation;

class ArticleReaction extends Model
{
    use HasFactory; // , HasTranslation, HasCountryCode

    protected $connection = 'tenant';
    protected $guarded = [];
    public static $snakeAttributes = false;

}



