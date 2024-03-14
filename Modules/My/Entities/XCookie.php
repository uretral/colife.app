<?php

namespace Modules\My\Entities;

class XCookie extends \Illuminate\Database\Eloquent\Model
{

    protected $connection = 'my';
    protected $table = 'XCookie';
    protected $guarded = [];

    protected $casts = [
        'json' => 'collection'
    ];
}
