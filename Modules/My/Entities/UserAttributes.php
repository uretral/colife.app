<?php

namespace Modules\My\Entities;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserAttributes extends Model
{
    use HasFactory, SoftDeletes;

    protected $connection = "my";
    protected $table = "user_attributes";

    protected $with = ['position'];

    protected $casts = [
        'bod'       => 'datetime:Y-m-d',
        'socials'   => 'array',
        'interests' => 'array'
    ];

    protected $attributes = [
        'interests' => '[]'
    ];

    protected $fillable = [
        'user_id',
        'position_id',
        'phone',
        'phone_verified',
        'phone_sub',
        'surname',
        'bod',
        'telegram',
        'facebook',
        'jon',
        'interests',
        'save_data',
        'location',
        'cleaning',
        'master',
        'email_notification',
        'sms_notification',
        'bonus',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function position(): HasOne
    {
        return $this->hasOne(UserPosition::class,'id','position_id');
    }

}
