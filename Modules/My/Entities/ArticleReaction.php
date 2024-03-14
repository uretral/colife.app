<?php

namespace Modules\My\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleReaction extends Model
{
    use HasFactory;

    protected $connection = 'my';
    protected $guarded = [];
    public static $snakeAttributes = false;

}



