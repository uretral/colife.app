<?php


namespace Modules\My\Data\Casts;


use App\Enums\RoleEnum;
use App\Services\Bitrix\Data\CrmContact\BitrixCrmContactData;
use App\Services\Bitrix\Models\BitrixCrmContact;
use Illuminate\Support\Carbon;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class AppealContactCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {
        foreach ($value as $user) {
            if ($user['role'] == RoleEnum::LANDLORD()->value) {
                return BitrixCrmContactData::fromModel(BitrixCrmContact::whereBxId($user['bx_id'])->first());
            }
        }
    }
}
