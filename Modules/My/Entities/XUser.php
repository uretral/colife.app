<?php

namespace Modules\My\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class XUser extends Model
{
    use SoftDeletes;

    protected $connection = 'my';
    protected $table = 'XUsers';
    protected $guarded = [];
}
