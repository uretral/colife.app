<?php

namespace Modules\Lk\Console;


use App\Enums\RoleEnum;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Modules\Lk\Entities\User;
use Spatie\Permission\Models\Role;

class SeedUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'seed:users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Пользователь поддержки + роль';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $this->seedRoles();
        $this->seedSupportUser();

        $this->info('Пользователь поддержки заполнен');
        return Command::SUCCESS;
    }

    private function seedRoles()
    {
        $roles = ['tenant', 'landlord', 'partner', 'support'];
        foreach ($roles as $item) {
            Role::updateOrCreate(['name' => $item]);
        }
    }

    private function seedSupportUser()
    {
        $role = Role::where('name', RoleEnum::SUPPORT()->value)->first();

        $user = User::updateOrCreate(
            [
                'name' => "Поддержка",
            ],
            [
                'name'     => "Поддержка",
                'email'    => "support@colife.ru",
                'password' => Hash::make(Str::random()),
                'bx_id'    => 4,
            ]
        );
        return $user->roles()->sync($role);
    }
}
