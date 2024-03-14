<?php

namespace Modules\My\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class AppealThemePriority extends Model
{
    use HasFactory;

    protected     $connection      = 'my';
    protected $table = "appeal_priority";
    protected     $guarded         = [];
    public static $snakeAttributes = false;
}
