<?php

namespace Modules\Lk\Livewire\Form;

use Livewire\Attributes\Rule;
use Livewire\Form;
use Modules\Lk\Data\User\UserData;
use Modules\Lk\Http\Controllers\UserController;

class ProfileCardPasswordForm extends Form
{
    #[Rule('required|min:6')]
    public $password = '';

    #[Rule('required|min:6')]
    public $newPassword = '';

    public int $userId;

    public function set(UserData $user)
    {
        $this->userId = $user->id;
    }

    public function open()
    {
        $this->component->dispatch('onChangePass', open: true);
    }

    public function close()
    {
        $this->component->dispatch('onChangePass', open: false);
    }

    public function submit()
    {
        $this->validate([
            'password' => 'required|min:6',
            'newPassword' => 'required|min:6',
        ]);

        if (app(UserController::class)->changePassword($this->password, $this->newPassword)) {
            $this->component->dispatch('onChangePassword', true);
            $this->component->dispatch('onNotify', [
                'header' => __('lk.notifications.changePassword.success'),
                'timeout' => 5000
            ]);
        } else {
            $this->component->dispatch('onChangePassword', false);
            $this->component->dispatch('onError', [
                'header' => __('lk.notifications.changePassword.error'),
                'timeout' => 5000
            ]);
        }

       $this->close();
    }
}
