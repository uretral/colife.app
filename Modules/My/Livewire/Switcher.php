<?php

namespace Modules\My\Livewire;

use Illuminate\Support\Str;
use Livewire\Attributes\Locked;
use Modules\My\Data\Chat\ChatMenuData;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Modules\My\Jobs\Amplitude\AmplitudeGoToFaqJob;
use Modules\My\Jobs\Amplitude\AmplitudeCreateRequestJob;
use Modules\My\Repositories\UserRepository;
use Spatie\LaravelData\DataCollection;

class Switcher extends Component
{

    public int $switcherMenuId = 1;
    public int $chatsQty       = 0;

    #[Locked]
    public ?string $current = null;

    public function onAppealModal()
    {
        $this->dispatch('onAppealOpen',open: true);
        AmplitudeCreateRequestJob::dispatch();
    }

    public function switcherMenu(): DataCollection
    {
        $counts = UserRepository::getNotificationsCounts();
        $this->dispatch('onNotificationsUpdate', header: 'Новые события');
        return ChatMenuData::collection(
            [
                ['id' => 1, 'title' => __('menu-incoming-requests'), 'cnt' => $counts->requests, 'link' => 'my.request'],
                ['id' => 2, 'title' => __('menu-outgoing-calls'), 'cnt' => $counts->appeals, 'link' => 'my.appeal'],
                ['id' => 3, 'title' => __('menu-faq'), 'cnt' => null, 'link' => 'my.faq']
            ]
        );
    }

    public function amplitude() {
        $link = \Route::getCurrentRoute()->getName();
        if($link == 'my.faq') {
            AmplitudeGoToFaqJob::dispatch(['faq_section_chosen' => 'general rules']);
        }
    }

    public function mount() {
//        dump(\Route::getCurrentRoute()->getName());
        $this->amplitude();
        $this->current = request()->segment(1);
//        Str::contains($item->link,request()->segment(1)))

    }


    public function render(): View
    {
        return view(
            'my::livewire.switcher',
            [
                'switcherMenu' => $this->switcherMenu(),
            ]
        );
    }
}
