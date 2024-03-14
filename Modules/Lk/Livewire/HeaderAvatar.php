<?php

namespace Modules\Lk\Livewire;

use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Modules\Lk\Data\User\UserData;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Modules\Lk\Repositories\UserRepository;

class HeaderAvatar extends Component
{

    public int $fresher = 1;

    #[On('onAvatarUploaded')]
    public function onAvatarUploaded()
    {
        $this->fresher++;
    }

    // todo: lk -> Не рефрешится аватар

    #[Computed]
    public function avatar(): string
    {
        $user = UserData::from(UserRepository::getAuthUser());

        return $user?->avatar?->key
            ? asset('/storage/' . $user->avatar->key)
            : \vite::asset('Modules/Lk/Resources/assets/img/user.png');
    }

    public function render(): View
    {

        return view('lk::livewire.header-avatar');
    }
}
