<?php

namespace Modules\My\Broadcasting;

use Modules\My\Entities\Appeal;
use Modules\My\Entities\User;

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
