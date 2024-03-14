<?php

namespace Modules\Lk\Entities;

use Modules\Lk\Entities\User;
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
 * Modules\Lk\Entities;
 *
 * @property int $id
 * @property int $theme_id
 * @property int $type_id
 * @property int $status_id
 * @property string $lastMessage
 * @property string $firstMessage
 * @property int $active
 * @property int $score
 * @property \Illuminate\Support\Carbon|null $delivered_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\AppealMessage> $messages
 * @property-read int|null $messages_count
 * @property-read \Modules\Lk\Entities\AppealStatus|null $status
 * @property-read \Modules\Lk\Entities\AppealTheme|null $theme
 * @property-read \Modules\Lk\Entities\AppealThemeType|null $themeType
 * @property-read \Illuminate\Database\Eloquent\Collection<int, User> $users
 * @property-read int|null $users_count
 * @method static Builder|Appeal newModelQuery()
 * @method static Builder|Appeal newQuery()
 * @method static Builder|Appeal query()
 * @method static Builder|Appeal whereActive($value)
 * @method static Builder|Appeal whereCreatedAt($value)
 * @method static Builder|Appeal whereId($value)
 * @method static Builder|Appeal whereLastMessage($value)
 * @method static Builder|Appeal whereFirstMessage($value)
 * @method static Builder|Appeal whereStatusId($value)
 * @method static Builder|Appeal whereThemeId($value)
 * @method static Builder|Appeal whereTypeId($value)
 * @method static Builder|Appeal whereUpdatedAt($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\Lk\Entities\AppealUser> $appealUsers
 * @property-read int|null $appeal_users_count
 * @property-read \Modules\Lk\Entities\AppealBitrix|null $bitrix
 * @mixin \Eloquent
 */
class Appeal extends Model
{
    use HasFactory, BroadcastsEvents,Notifiable;

    protected     $connection      = 'tenant';
    protected     $guarded         = [];
    public static $snakeAttributes = false;
    protected     $with            = [
        'users.chatAttributes',
        'users.attributes',
        'users',
        'theme',
        'themeType',
        'status',
        'bitrix',
        'appealUsers',
    ];

    protected $fillable = ["theme_id", "type_id", "lastMessage", "status_id", "active", 'delivered_at'];

    public function lastMessage(): Attribute
    {
        return Attribute::make(
            get: fn($value) => AppealMessage::whereAppealId($this->id)
            ->orderBy('created_at', 'desc')->first()
        );
    }

    public function firstMessage(): Attribute
    {
        return Attribute::make(
            get: fn($value) => AppealMessage::whereAppealId($this->id)
                ->orderBy('created_at')->first()
        );
    }

    public function users(): HasManyThrough
    {
        return $this->hasManyThrough(
            User::class,
            AppealUser::class,
            'appeal_id',
            'id',
            'id',
            'user_id'
        );
    }

    public function messages(): HasMany
    {
        return $this->hasMany(AppealMessage::class, 'appeal_id', 'id');
    }

    public function theme(): HasOne
    {
        return $this->hasOne(AppealTheme::class, 'id', 'theme_id');
    }

    public function themeType(): HasOne
    {
        return $this->hasOne(AppealThemeType::class, 'id', 'type_id');
    }

    public function status(): HasOne
    {
        return $this->hasOne(AppealStatus::class, 'id', 'status_id');
    }

    public function bitrix(): HasOne
    {
        return $this->hasOne(AppealBitrix::class);
    }

    public function appealUsers(): HasMany
    {
        return $this->hasMany(AppealUser::class, 'appeal_id', 'id');
    }

    public static function getCount(): int
    {
        return self::whereHas(
            'users',
            function ($q) {
                $q->where('users.id', auth()->guard('lk')->user()->id);
            }
        )->count();
    }

    public static function getByBitrixChatId($chatId): Builder|Appeal
    {
        return self::whereHas('bitrix', fn($q) => $q->whereBxChatUid($chatId));
    }

    public function broadcastOn(string $event): array
    {
        return [
            new PrivateChannel('appeals.'. $this->id)
        ];
    }

}
