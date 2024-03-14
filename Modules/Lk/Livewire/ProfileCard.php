<?php

namespace Modules\Lk\Livewire;

use Modules\Lk\Data\User\UserData;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Modules\Lk\Livewire\Form\ProfileCardDeleteForm;
use Modules\Lk\Livewire\Form\ProfileCardPasswordForm;
use Modules\Lk\Livewire\Form\ProfileCardUserForm;
use Modules\Lk\Repositories\UserRepository;
use Livewire\WithFileUploads;

class ProfileCard extends Component
{
    use WithFileUploads;

    public ProfileCardUserForm $profileCardUser;
    public ProfileCardDeleteForm $profileCardDelete;
    public ProfileCardPasswordForm $profileCardPassword;

    public function mount() {

        $user = UserData::from(UserRepository::getAuthUser());
        $this->profileCardUser->set($user);
        $this->profileCardPassword->set($user);
    }

    public function profileCardDeleteAction($action) {
        $this->profileCardDelete->$action();
    }

    public function profileCardPasswordAction($action) {
        $this->profileCardPassword->$action();
    }

    /**
     * @throws \Exception
     */
    public function updating($property, $value)
    {
        if (str_contains($property, 'profileCardUser')) {
            $this->profileCardUser->save($value);
        }
    }

    public function render(): View
    {
        return view('lk::livewire.profile-card');
    }
}
