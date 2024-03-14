<?php

namespace Modules\Lk\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use Modules\Lk\Repositories\UserRepository;

class HeaderNotification extends Component
{


    public mixed $notifications = false;

    public function mount() {
        $this->hasNotifications();
    }

    public function getListeners()
    {
        $listeners = [];
        if($userId = UserRepository::getAuthId()) {
            $event = "echo-private:tenants.{$userId},.tenantNotice";
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
        return view('lk::livewire.header-notification', [
            'notifications' => $this->notifications,
        ]);
    }
}
