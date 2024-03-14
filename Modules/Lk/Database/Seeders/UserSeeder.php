<?php

namespace Modules\Lk\Database\Seeders;

use App\Enums\RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Modules\Lk\Entities\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    use WithoutModelEvents;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name',RoleEnum::SUPPORT()->value)->first();

        $user = User::updateOrCreate([
            'email' => "support@colife.ru",
        ],
            [
                'name' => "Поддержка",
                'email' => "support@colife.ru",
                'password' => Hash::make(Str::random()),
                'bx_id' => 4,
            ]
        );
        $user->roles()->sync($role);
    }
}
