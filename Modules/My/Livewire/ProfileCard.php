<?php

namespace Modules\My\Livewire;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Enumerable;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\My\Data\User\UserData;
use Modules\My\Data\User\UserDeleteReasonData;
use Modules\My\Data\User\UserShortData;
use Modules\My\Entities\User;
use Modules\My\Entities\UserDeleteReason;
use Modules\My\Jobs\Amplitude\AmplitudeAddPhotoJob;
use Modules\My\Jobs\Amplitude\AmplitudeChangePhotoJob;
use Modules\My\Livewire\Forms\ProfileCardDeleteForm;
use Modules\My\Livewire\Forms\ProfileCardPasswordForm;
use Modules\My\Livewire\Forms\ProfileCardUserForm;
use Modules\My\Repositories\UserRepository;

class ProfileCard extends Component
{
    use WithFileUploads;

    public ProfileCardUserForm $profileCardUser;
    public ProfileCardDeleteForm $profileCardDelete;
    public ProfileCardPasswordForm $profileCardPassword;

    public function mount()
    {
        $user = UserShortData::from(UserRepository::getAuthUser());
        $this->profileCardUser->set($user);
        $this->profileCardPassword->set($user);
    }

    #[On('onChangeAvatarImage')]
    public function onChangeAvatarImage($page)
    {
        /* Событие Amplitude - Смена фото */
        AmplitudeChangePhotoJob::dispatch(['page' => $page]);
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
        return view('my::livewire.profile-card');
    }
}
