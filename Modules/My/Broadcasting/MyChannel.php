<?php


namespace Modules\My\Broadcasting;


use Illuminate\Support\Facades\Log;
use Modules\My\Entities\User;

class MyChannel
{
    public function join(User $user, $id): bool
    {
        Log::info('MyChannel' . $id);
        return (int) $user->id === (int) $id;
    }
}
