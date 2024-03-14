<?php


namespace Modules\Lk\Data\Casts;


use Modules\Lk\Data\Chat\BitrixChatConactData;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class ChatContactCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {
        foreach ($value as $user) {

            if (!empty($user['role'])) {
                $role = $user['role'];
            } else {
                $role = $user['roles'][0]['name'];
            }
            if ($role != "support") {
                return BitrixChatConactData::from($user);
            }
        }
        return null ;
    }
}
