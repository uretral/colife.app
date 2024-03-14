<?php

namespace Modules\Lk\Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class UserRoleSeeder extends Seeder
{
    protected array $data = [
        'tenant'   => ['guard' => 'tenant'],
        'landlord' => ['guard' => 'my'],
        'partner'  => ['guard' => 'tenant'],
        'support'  => ['guard' => 'tenant'],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $roleName => $item) {
            Role::updateOrCreate(['name' => $roleName, 'guard_name' => $item['guard']]);
        }
    }
}
