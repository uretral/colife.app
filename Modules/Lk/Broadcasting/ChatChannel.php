<?php


namespace Modules\Lk\Broadcasting;

use Modules\Lk\Entities\User;
use Modules\Lk\Entities\Chat;

class ChatChannel
{

    public function join(User $user, $chatId): bool
    {
        return Chat::whereHas(
            'users',
            function ($q) use ($user) {
                $q->where('users.id', $user->id);
            })->whereId($chatId)
            ->count();
    }
}


