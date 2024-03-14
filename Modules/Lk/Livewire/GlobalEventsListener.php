<?php

namespace Modules\Lk\Livewire;

use Livewire\Component;
use Modules\Lk\Jobs\Amplitude\AmplitudeAddPhotoJob;
use Modules\Lk\Jobs\Amplitude\AmplitudeSupportJob;
use Modules\Lk\Livewire\Traits\HasAmplitudeListener;

class GlobalEventsListener extends Component
{
    use HasAmplitudeListener;


    protected $listeners = [
        'onAuthSupportLinkClick',
        'onSelectAvatarImage'
    ];

    public function onAuthSupportLinkClick($page)
    {
        /* Событие Amplitude - Клик на кнопку обратиться в поддержку */
        AmplitudeSupportJob::dispatch(['page' => $page]);
    }

    public function onSelectAvatarImage($page)
    {
        /* Событие Amplitude - Смена фото */
        AmplitudeAddPhotoJob::dispatch(['page' => $page]);
    }


    public function render(): string
    {
        return <<<'blade'
            <div></div>
        blade;
    }
}
