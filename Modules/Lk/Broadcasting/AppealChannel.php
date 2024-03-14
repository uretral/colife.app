<?php

namespace Modules\Lk\Broadcasting;

use Modules\Lk\Entities\Appeal;
use Modules\Lk\Entities\User;

class AppealChannel
{
    public function join(User $user, $appealId): bool
    {
        return Appeal::whereHas(
            'users',
            function ($q) use ($user) {
                $q->where('users.id', $user->id);
            })->whereId($appealId)
            ->count();
    }
}
