<?php

namespace Modules\My\Entities;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Modules\My\Traits\HasFiles;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Traits\HasRoles;


// implements MustVerifyEmail
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles, HasPermissions, HasFiles;


    protected $connection = "my";
    protected $table = "users";

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

    protected $with = ['roles','chatAttributes','attributes','files','contact', 'avatar'];

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
        return 'my.users.' . $this->id;
    }

/*    public function avatar(): Attribute
    {
        return Attribute::make(
            get: fn($value) => $this->files()->whereType("avatar")->first()?->url
        );
    }*/

    public function avatar(): HasOne
    {
        return $this->hasOne(File::class,'model_id')->where('model_type', self::class)->where('type', 'avatar');
    }

    public function contact(): HasOne
    {
        return $this->hasOne(Contact::class,'user_id','id');
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class,'user_id','id');
    }

}
