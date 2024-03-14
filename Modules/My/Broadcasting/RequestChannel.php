<?php


namespace Modules\My\Broadcasting;

use Modules\My\Entities\User;
use Modules\My\Entities\Request;

class RequestChannel
{

    public function join(User $user, $requestId): bool
    {
        return Request::whereHas(
            'users',
            function ($q) use ($user) {
                $q->where('users.id', $user->id);
            })->whereId($requestId)
            ->count();
    }
}


