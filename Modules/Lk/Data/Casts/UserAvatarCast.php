<?php


namespace Modules\Lk\Data\Casts;


use App\Enums\RoleEnum;
use Modules\Lk\Entities\User;
use App\Services\Bitrix\Data\CrmContact\BitrixCrmContactData;
use App\Services\Bitrix\Models\BitrixCrmContact;
use App\Services\TenantAccount\TenantService;
use App\Services\User\Data\UserData;
use Illuminate\Support\Carbon;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\Support\DataProperty;

class UserAvatarCast implements Cast
{
    public function cast(DataProperty $property, mixed $value, array $context): mixed
    {
        return $value->where("type","avatar")->first()?->url;
    }
}
