<?php


namespace Modules\Lk\Broadcasting;


use Illuminate\Support\Facades\Log;
use Modules\Lk\Entities\User;

class TenantChannel
{
    public function join(User $user, $id): bool
    {
        Log::info('TenantChannel' . $id);
        return (int) $user->id === (int) $id;
    }
}
