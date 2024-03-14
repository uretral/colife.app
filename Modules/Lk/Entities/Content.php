<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Content extends Model
{
    use HasFactory;

    protected $connection = 'tenant';
    protected $guarded = [];

}
