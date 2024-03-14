<?php


namespace App\Services\Bitrix\Data\Castables;


use App\Services\Bitrix\Data\Chats\BitrixChatUserData;
use App\Services\Bitrix\Models\BitrixCrmContact;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class ContactCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {
        $r = null;
        if (!empty($value)) {
            $contact = BitrixCrmContact::whereBxId($value)->first() ?? null;
            $r = BitrixChatUserData::from($contact);
        }
        return $r;
    }
}
