<?php


namespace Modules\Tenant\Data\Casts;


use App\Enums\RoleEnum;
use App\Services\Bitrix\Data\CrmContact\BitrixCrmContactData;
use App\Services\Bitrix\Models\BitrixCrmContact;
use Illuminate\Support\Carbon;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class ChatLastMessageCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {

        return $value;

    }
}
