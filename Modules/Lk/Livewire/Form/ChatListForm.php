<?php

namespace Modules\Lk\Livewire\Form;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Enumerable;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Modules\Lk\Data\Chat\ChatData;
use Modules\Lk\Entities\Chat as Model;
use Modules\Lk\Repositories\UserRepository;
use Spatie\LaravelData\DataCollection;

class ChatListForm extends \Livewire\Form
{
    #[Locked]
    public int $userId;
    public ?int $id = null;
    public ?Enumerable $chats;

    #[Computed]
    public function chat()
    {
        if (!$chat = $this->chats->where('active', '==', 1)->first()) {
            $chat = $this->chats->first();
        }

        return $chat;
    }

    public function setActiveChat($id)
    {
        Model::whereIn('id', $this->chats->pluck('id')->toArray())->update(['active' => 0]);
        Model::whereId($id)->update(['active' => 1]);
        $this->chats = $this->chats();
    }


    public function chats(): Enumerable
    {
        return ChatData::collection(Model::with(['users.chatAttributes', 'messages'])
            ->whereHas(
                'users',
                function ($q) {
                    $q->where('users.id', $this->userId);
                }
            )->withCount(
                [
                    'messages as hasUnread' => function (Builder $query) {
                        $query->where('read', '==', 0);
                    }
                ]
            )->get())->toCollection();
    }

    public function chatListInit()
    {
        $this->userId = UserRepository::getAuthId();
        $this->chats = $this->chats();
    }

    public function getUserData($userId)
    {
        return $this->chat()->users->where('id', '==', $userId)->first();
    }

}
