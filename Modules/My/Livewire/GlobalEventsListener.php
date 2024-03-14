<?php

namespace Modules\My\Livewire;

use Livewire\Attributes\On;
use Livewire\Component;
use Modules\My\Jobs\Amplitude\AmplitudeAddPhotoJob;
use Modules\My\Jobs\Amplitude\AmplitudeSupportJob;

class GlobalEventsListener extends Component
{
    #[On('onAuthSupportLinkClick')]
    public function onAuthSupportLinkClick($page)
    {
        /* Событие Amplitude - Клик на кнопку обратиться в поддержку */
        AmplitudeSupportJob::dispatch(['page' => $page]);
    }


    #[On('onSelectAvatarImage')]
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
