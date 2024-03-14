<?php

namespace Modules\My\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\My\Traits\HasCountryCode;
use Modules\My\Traits\HasTranslation;

class WorkModel extends Model
{
    use HasFactory, HasTranslation;

    protected $connection = 'my';
    protected $guarded = [];
}
