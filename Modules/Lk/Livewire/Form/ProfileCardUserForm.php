<?php

namespace Modules\Lk\Livewire\Form;

use Carbon\Carbon;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Modules\Lk\Data\User\UserData;
use Modules\Lk\Helpers\TenantHelper;

class ProfileCardUserForm extends Form
{
    public ?string $name = '';
    public ?string $surname = '';
    public ?string $phone = '';
    public ?string $email = '';
    public ?string $date = '';
    public ?string $country_code = '';

    public $avatar = '';
    #[Rule('image|max:10024')]
    public $tmpImage;

    public function set(UserData $user): void
    {
        $this->name = $user->name;
        $this->surname = $user?->attributes?->surname;
        $this->email = $user?->email;
        $this->country_code = $user?->country_code;
        $this->phone = $user?->attributes?->phone;
        $this->avatar = $user?->avatar?->key
            ? asset('/storage/' . $user->avatar->key)
            : \vite::asset('Modules/Lk/Resources/assets/img/user.png');
        $this->date = Carbon::parse($user->created_at)->format('d.m.Y');
    }


    /**
     * @throws \Exception
     */
    public function save($value) {
       TenantHelper::updateUserAvatar($value);
        $this->component->dispatch('onAvatarUploaded');
    }
}
