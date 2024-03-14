<?php

namespace Modules\Lk\Entities;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Modules\Lk\Entities\User;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Database\Eloquent\BroadcastsEvents;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Notifications\Notifiable;

class Chat extends Model
{
    use HasFactory, BroadcastsEvents,Notifiable;

    protected     $connection      = 'tenant';
    protected     $guarded         = [];
    public static $snakeAttributes = false;

    protected $fillable = [
        'title',
        'icon',
        'is_group',
        'created_at',
        'updated_at'
    ];
    protected $with = ['last'];

    public function lastMessage(): Attribute
    {
        return Attribute::make(
            get: fn($value) => ChatMessage::whereChatId($this->id)->orderBy('created_at', 'desc')->first()
        );
    }

    public function last()
    {
        return $this->hasOne(ChatMessage::class,'chat_id','id' )->latest();
        // order by by how ever you need it ordered to get the latest
    }

    public function users(): HasManyThrough
    {
        return $this->hasManyThrough(
            User::class,
            ChatUser::class,
            'chat_id',
            'id',
            'id',
            'user_id',
        );
    }

    public function bitrix(): HasOne
    {
        return $this->hasOne(ChatBitrix::class);
    }

    public static function chatExists(int $userId, $isGroup = 0)
    {
        return self::whereHas(
            'users',
            function ($q) use ($userId) {
                $q->where('users.id', $userId);
            }
        )->whereIsGroup($isGroup)->first();
    }

    public static function getByBitrixChatId($chatId): Builder|Chat
    {
        return self::whereHas('bitrix', fn($q) => $q->whereBxChatUid($chatId));
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

    public function broadcastOn(string $event): array
    {
        return [
            new PrivateChannel('chats.'. $this->id)
        ];
    }

    public function messages(): HasMany
    {
        return $this->hasMany(ChatMessage::class, 'chat_id', 'id');
    }

}
