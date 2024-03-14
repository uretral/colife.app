<?php

namespace Modules\My\Livewire\Forms;

use Carbon\Carbon;
use Livewire\Attributes\Rule;
use Livewire\Form;
use Modules\My\Data\User\UserShortData;
use Modules\My\Helpers\UserHelper;

class ProfileCardUserForm extends Form
{
    public ?string $name = '';
    public ?string $surname = '';
    public ?string $phone = '';
    public ?string $email = '';
    public ?string $date = '';

    public $avatar = '';
    #[Rule('image|max:10024')]
    public $tmpImage;

    public function set(UserShortData $user)
    {
        $this->name = $user->name;
        $this->surname = $user?->attributes?->surname;
        $this->email = $user?->email;
        $this->phone = $user?->attributes?->phone;
        $this->avatar = $user?->avatar?->key
            ? asset('/storage/' . $user->avatar->key)
            : \vite::asset('Modules/My/Resources/assets/img/user.png');
        $this->date = Carbon::parse($user->created_at)->format('d.m.Y');
    }


    /**
     * @throws \Exception
     */
    public function save($value) {
        UserHelper::updateUserAvatar($value);
        $this->component->dispatch('onAvatarUploaded');
    }


}
