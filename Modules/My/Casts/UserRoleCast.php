<?php


namespace Modules\My\Casts;


use Modules\My\Data\User\RoleData;
use Spatie\LaravelData\Attributes\WithCast;
use Spatie\LaravelData\Casts\Cast;
use Spatie\LaravelData\DataCollection;
use Spatie\LaravelData\Support\DataProperty;
use Spatie\Permission\Models\Role;

/**
 * Временный кастинг роли как жилец
 * Class UserRoleCast
 * @package App\Services\User\Data\Cast
 */
class UserRoleCast implements Cast
{
    private string $role_name = 'landlord';

    public function cast(DataProperty $property, mixed $value, array $context): DataCollection
    {

        // Временное решение
        if (!$role = Role::where('name', $this->role_name)->get())
            $role = Role::get();

        return RoleData::collection($role);
    }

    private function getAttributeId(DataProperty $property): void
    {
        $this->role_name = $property->attributes->filter(
                fn(object $attribute) => $attribute instanceof WithCast
            )->first()->arguments[0] ?? 1;
    }
}
