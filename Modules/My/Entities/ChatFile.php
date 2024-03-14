<?php

namespace Modules\My\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatFile extends Model
{
    protected $connection = 'my';
    use HasFactory;

    protected     $guarded         = [];
    public static $snakeAttributes = false;
}
