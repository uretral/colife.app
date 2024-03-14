<?php

namespace Modules\Lk\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Modules\Lk\Data\Chat\ChatMessageData;
use Modules\Lk\Entities\ChatFile;
use Modules\Lk\Repositories\UserRepository;

class UserController
{

    public function changePassword($oldPass, $newPass): mixed
    {
        $user = UserRepository::getAuthUser();
        if(!Hash::check($oldPass, $user->password)){
            return false;
        }

        $user->update([
            'password' => Hash::make($newPass)
        ]);
        return true;
    }

}
