<?php

namespace Modules\Lk\Livewire;

use Livewire\Attributes\Computed;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Enumerable;
use Livewire\Component;
use Modules\Lk\Data\Form\SelectOptionData;
use Modules\Lk\Data\User\UserData;
use Modules\Lk\Entities\UserInterest;
use Modules\Lk\Entities\UserPosition;
use Modules\Lk\Repositories\UserRepository;

class ProfileInfo extends Component
{

    public UserData $user;
    public ?int $limit;

    public function mount()
    {
        $this->setUser();
        $this->limit = config('lk.profile.info.select-buttons-limit',12);
    }

    public function setUser() {
        $this->user = UserData::from(UserRepository::getAuthUser());
    }

    #[Computed]
    public function positions(): Enumerable
    {
        return SelectOptionData::collection(UserPosition::whereActive(1)->get())->toCollection();
    }

    #[Computed]
    public function interests(): Enumerable
    {
        return SelectOptionData::collection(UserInterest::where('active', 1)->get())->toCollection();
    }

    public function viewAll()
    {
        $this->limit = 10000;
    }

    public function viewLess()
    {
        $this->limit = config('lk.profile.info.select-buttons-limit',12);
    }

    public function save()
    {
        if($this->user->attributes->createOrUpdate()) {
            $this->dispatch('onNotify', ['header' => __('common-save-success'), 'timeout' => 2000]);
            $this->dispatch('onProfileAdditionalInfoUpdated', $this->user);
        } else {
            $this->dispatch('onError', ['header' => __('common-save-error'), 'timeout' => 2000]);
        }
    }

    public function render(): View
    {
        return view('lk::livewire.profile-info');
    }
}
