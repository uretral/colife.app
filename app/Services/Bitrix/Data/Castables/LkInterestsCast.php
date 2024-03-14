<?php


namespace App\Services\Bitrix\Data\Castables;


use App\Services\Bitrix\Data\Chats\BitrixChatUserData;
use App\Services\Bitrix\Models\BitrixCrmContact;
use App\Services\TenantAccount\Models\UserInterest;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class LkInterestsCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {
        $r = "";
        if (!empty($value)) {
            $r .= UserInterest::find($value)?->pluck('title')->implode(", ");
        }
        return $r;
    }
}
