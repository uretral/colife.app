<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatFile extends Model
{
    protected $connection = 'tenant';
    use HasFactory;

    protected     $guarded         = [];
    public static $snakeAttributes = false;
}
