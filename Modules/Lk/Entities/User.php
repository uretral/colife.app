<?php

namespace Modules\Lk\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;
use Laravel\Sanctum\HasApiTokens;
use Modules\Lk\Notifications\PasswordResetNotification;
use Modules\Lk\Observers\UserObserver;
use Modules\Lk\Traits\HasFiles;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;


// implements MustVerifyEmail
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles, HasPermissions, HasFiles;


    protected $connection = "tenant";
    protected $table = "users";

    protected array $observers = [
        User::class => [UserObserver::class],
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'bx_id',
        'locale',
        'country_code',
        'name',
        'email',
        'password',
        'deleted_at',
        'delete_reason',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $with = ['roles','chatAttributes','attributes','files'];

    public static $snakeAttributes = false;


    public function attributes(): HasOne
    {
        return $this->HasOne(UserAttributes::class, 'user_id', 'id');
    }

    public function chatAttributes(): HasOne
    {
        return $this->hasOne(UserChatAttributes::class,'user_id','id');
    }

    public function receivesBroadcastNotificationsOn()
    {
        return 'tenants.' . $this->id;
    }

    public function avatar(): HasOne
    {
        return $this->hasOne(File::class,'model_id')->where('model_type', self::class)->where('type', 'avatar');
    }

    public function sendPasswordResetNotification($token)
    {

        $this->notify(new PasswordResetNotification($token, $this->email, $this->locale));
    }

}
