<?php

namespace Modules\My\Entities;

use Modules\My\Entities\User;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;


/**
 *
 * @property int $id
 * @property int $theme_id
 * @property int $status_id
 * @property string $lastMessage
 * @property int $active
 * @property int $score
 * @property \Illuminate\Support\Carbon|null $delivered_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\RequestMessage> $messages
 * @property-read int|null $messages_count
 * @property-read \Modules\My\Entities\AppealStatus|null $status
 * @property-read \Modules\My\Entities\RequestTheme|null $theme
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $users
 * @property-read int|null $users_count
 * @method static Builder|Request newModelQuery()
 * @method static Builder|Request newQuery()
 * @method static Builder|Request query()
 * @method static Builder|Request whereActive($value)
 * @method static Builder|Request whereCreatedAt($value)
 * @method static Builder|Request whereId($value)
 * @method static Builder|Request whereLastMessage($value)
 * @method static Builder|Request whereStatusId($value)
 * @method static Builder|Request whereThemeId($value)
 * @method static Builder|Request whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\My\Entities\RequestUser> $RequestUsers
 * @property-read int|null $Request_users_count
 * @property-read \Modules\My\Entities\RequestBitrix|null $bitrix
 * @mixin \Eloquent
 */
class Request extends Model
{
    use HasFactory, BroadcastsEvents,Notifiable;

    protected     $connection      = 'my';
    protected     $guarded         = [];
    public static $snakeAttributes = false;
    protected     $with            = [
        'users.chatAttributes',
        'users.attributes',
        'users',
        'theme',
        'status',
        'bitrix',
        'RequestUsers',
    ];

    protected $fillable = ["theme_id", "type_id", "lastMessage", "status_id", "active", 'delivered_at'];

    public function lastMessage(): Attribute
    {
        return Attribute::make(
            get: fn($value) => RequestMessage::whereRequestId($this->id)->whereNot('message',config('my.rateable'))
            ->orderBy('created_at', 'desc')->first()
        );
    }

    public function users(): HasManyThrough
    {
        return $this->hasManyThrough(
            User::class,
            RequestUser::class,
            'Request_id',
            'id',
            'id',
            'user_id'
        );
    }

    public function messages(): HasMany
    {
        return $this->hasMany(RequestMessage::class, 'Request_id', 'id');
    }

    public function theme(): HasOne
    {
        return $this->hasOne(RequestTheme::class, 'id', 'theme_id');
    }


    public function status(): HasOne
    {
        return $this->hasOne(AppealStatus::class, 'id', 'status_id');
    }

    public function bitrix(): HasOne
    {
        return $this->hasOne(RequestBitrix::class);
    }

    public function RequestUsers(): HasMany
    {
        return $this->hasMany(RequestUser::class, 'request_id', 'id');
    }

    public static function getCount(): int
    {
        return self::whereHas(
            'users',
            function ($q) {
                $q->where('users.id', auth()->guard('my')->user()->id);
            }
        )->count();
    }

    public static function getByBitrixChatId($chatId): Builder|Request
    {
        return self::whereHas('bitrix', fn($q) => $q->whereBxChatUid($chatId));
    }

    public function broadcastOn(string $event): array
    {
        return [
            new PrivateChannel('my.requests.'. $this->id)
        ];
    }

}
