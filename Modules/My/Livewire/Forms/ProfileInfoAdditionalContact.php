<?php

namespace Modules\My\Livewire\Forms;

use Livewire\Attributes\Rule;
use Livewire\Form;
use Modules\My\Data\User\UserContactData;
use Modules\My\Entities\Contact;
use Modules\My\Events\ProfileContactEvent;
use Modules\My\Repositories\UserRepository;

class ProfileInfoAdditionalContact extends Form
{
    public int $userId;
    #[Rule('required|min:16')]
    public ?string $phone = null;
    public ?string $phone_old = null;
    #[Rule('required')]
    public ?string $name = null;
    public ?string $name_old = null;
    public bool $editing = false;



    public function setAdditionalContact(?UserContactData $contactData)
    {
        $this->name = $contactData?->name;
        $this->phone = $contactData?->phone;
        $this->phone_old = $this->phone;
        $this->name_old = $this->name;
    }

    public function edit()
    {
        $this->editing = true;
    }

    public function cancel()
    {
        $this->editing = false;
        $validated = $this->validate([
            'phone_old' => 'required|min:16',
            'name_old' => 'required',
        ]);
        $this->phone = $validated['phone_old'];
        $this->name = $validated['name_old'];
    }

    public function update()
    {
        $validated = $this->validate([
            'phone' => 'required|min:16',
            'name' => 'required',
        ]);
        if (Contact::updateOrCreate(['user_id' => UserRepository::getAuthId()], $validated)) {
            $this->component->dispatch('onNotify', __('profile-notification-contact-added'));
            $this->component->dispatch('close-form');
            $this->cancel();

            event(new ProfileContactEvent(UserRepository::getAuthId(), $validated));
        }
    }
}
