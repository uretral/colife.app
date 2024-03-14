<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAttributes extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = "tenant";
    protected $table = "user_attributes";

    protected $with = ['position'];

    protected $casts = [
        'bod'       => 'datetime:Y-m-d',
        'socials'   => 'array',
        'interests' => 'array',
        'cleaning' => 'bool',
        'master' => 'bool',
        'email_notification' => 'bool',
        'sms_notification' => 'bool',
    ];

    protected $attributes = [
        'interests' => '[]'
    ];

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function position(): HasOne
    {
        return $this->hasOne(UserPosition::class,'id','position_id');
    }

}
