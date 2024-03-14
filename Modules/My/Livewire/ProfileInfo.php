<?php

namespace Modules\My\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Modules\My\Data\User\UserContactData;
use Modules\My\Data\User\UserShortData;
use Modules\My\Livewire\Forms\ProfileInfoAdditionalContact;
use Modules\My\Livewire\Forms\ProfileInfoAdditionalPhone;
use Modules\My\Repositories\UserRepository;

class ProfileInfo extends Component
{
    public ProfileInfoAdditionalPhone $additionalPhoneForm;
    public ProfileInfoAdditionalContact $contactForm;

    public function mount() {
        $this->additionalPhoneForm->setAdditionalPhoneForm($this->user()->attributes->phone_sub);
        $this->contactForm->setAdditionalContact($this->contact());
    }


    public function additionalPhone($action) {
        $this->additionalPhoneForm->$action();
    }

    public function additionalContact($action) {
        $this->contactForm->$action();
    }


    #[Computed]
    public function user(): UserShortData
    {
        return UserShortData::from(UserRepository::getAuthUser());
    }

    #[Computed]
    public function contact(): ?UserContactData
    {
        $contact = UserRepository::getUserContact();
        return $contact ?  UserContactData::from($contact) : null;
    }

    public function render(): View
    {
        return view('my::livewire.profile-info');
    }
}
