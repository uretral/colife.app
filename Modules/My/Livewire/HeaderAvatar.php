<?php

namespace Modules\My\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Modules\My\Data\User\UserShortData;
use Modules\My\Repositories\UserRepository;

class HeaderAvatar extends Component
{
    public int $fresher = 2;

    #[On('onAvatarUploaded')]
    public function onAvatarUploaded()
    {
        $this->fresher++;
    }

    #[Computed]
    public function avatar(): string
    {
        $user = UserShortData::from(UserRepository::getAuthUser());
        return $user?->avatar?->key
            ? asset('/storage/' . $user->avatar->key)
            : \vite::asset('Modules/My/Resources/assets/img/user.png');
    }

    public function render(): View
    {
        return view('my::livewire.header-avatar');
    }
}
