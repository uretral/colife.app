<?php

namespace Modules\My\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Modules\My\Repositories\UserRepository;

class HeaderNotification extends Component
{

    public mixed $notifications = false;

    public function __construct()
    {
        $this->notifications = UserRepository::hasNotifications();
    }

    public function getListeners()
    {
        $listeners = [];
        if($userId = UserRepository::getAuthId()) {
            $event = "echo-private:my.users.{$userId},.myNotice";
            $listeners[$event] = 'hasNotifications';
        }
        $listeners["onNotificationsUpdate"] = "hasNotifications";
        return $listeners;
    }

    public function hasNotifications() {
        $this->notifications = UserRepository::hasNotifications();
    }

    public function render(): View
    {
        return view('my::livewire.header-notification', [
            'notifications' => $this->notifications,
        ]);
    }
}
