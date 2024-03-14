<?php

namespace Modules\My\Livewire\Forms;


use Livewire\Attributes\Rule;
use Livewire\Features\SupportValidation\BaseRule;
use Livewire\Form;
use Modules\My\Events\ProfilePhoneEvent;
use Modules\My\Repositories\UserRepository;

class ProfileInfoAdditionalPhone extends Form
{
    #[Rule('required|min:16')]
    public ?string $phone_sub = null;
    public mixed $phone_old = null;
    public bool $editing = false;

    public function setAdditionalPhoneForm(?string $phone_sub)
    {
        $this->phone_sub = $phone_sub;
        $this->phone_old = $phone_sub;
    }

    public function save()
    {

        $validated = $this->validate(['phone_sub' => 'required|min:16']);
        if (UserRepository::getUserAttributes()->update($validated)) {
            $this->component->dispatch('onNotify', __('profile-notification-phone-added'));
            $this->cancel();
        }
        event(new ProfilePhoneEvent(
            userId: UserRepository::getAuthId(),
            phone: $validated['phone_sub'],
            phone_old: $this->phone_old)
        );
        $this->phone_old = $this->phone_sub;
    }

    public function edit()
    {
        $this->editing = true;
    }

    public function cancel()
    {

        $this->editing = false;
        $validated = $this->validate(['phone_old' => 'required|min:16']);
        $this->phone_sub = $validated['phone_old'];

    }


}
