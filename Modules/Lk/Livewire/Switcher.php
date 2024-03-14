<?php

namespace Modules\Lk\Livewire;

use App\Services\Amplitude\Handle\AmplitudeCreateRequest;
use App\Services\Amplitude\Handle\AmplitudeGoToFaq;
use App\Services\Amplitude\Handle\AmplitudeGoToRequests;
use Illuminate\Support\Facades\Route;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Locked;
use Modules\Lk\Data\Chat\ChatMenuData;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Modules\Lk\Jobs\Amplitude\AmplitudeCreateRequestJob;
use Modules\Lk\Jobs\Amplitude\AmplitudeGoToFaqJob;
use Modules\Lk\Jobs\Amplitude\AmplitudeGoToRequestsJob;
use Modules\Lk\Repositories\UserRepository;
use Spatie\LaravelData\DataCollection;

class Switcher extends Component
{
    /*-------------*/

    #[Locked]
    public string $currentRoute = '';

    public function mount()
    {
        $this->currentRoute = Route::currentRouteName();
    }

    #[Computed]
    public function switcherMenu(): DataCollection
    {
        $counts = UserRepository::getNotificationsCounts();
        $this->dispatch("onNotificationsUpdate");
        return ChatMenuData::collection(
            [
                ['id' => 1, 'title' => __('chat-nav-link'), 'cnt' => $counts->chats, 'link' => 'lk.chat'],
                ['id' => 2, 'title' => __('appeal-nav-link'), 'cnt' => $counts->appeals, 'link' => 'lk.appeal'],
                ['id' => 3, 'title' => __('faq-nav-link'), 'cnt' => null, 'link' => 'lk.faq']
            ]
        );
    }


    /*-------------*/

    public string $route = '';
    public int $switcherMenuId = 1;
    public int $chatsQty = 0;

    protected $listeners = ["onSwitcherUpdate" => "switcherMenu", "onSwitcherMenuClicked"];

    public function onCustomEvent($e)
    {
        $this->dispatch($e);

        if ($e === 'modal') {
            AmplitudeCreateRequestJob::dispatch();
        }
    }



    public function onSwitcherMenuClicked($link)
    {

        session()->put('currentRoute', $link);


        if ($link === 'lk.chat') {


        }

        if ($link === 'lk.appeal') {
            /* Событие Amplitude - Отправка обращения */
            AmplitudeGoToRequestsJob::dispatch([
                'updates' => 544545
            ]);
        }

        if ($link === 'lk.faq') {
            /* Событие Amplitude - Чат с поддержкой */
            AmplitudeGoToFaqJob::dispatch([
                'faq_section_chosen' => 'general rules'
            ]);

        }
    }


    public function render(): View
    {
        return view(
            'lk::livewire.switcher'
        );
    }
}
