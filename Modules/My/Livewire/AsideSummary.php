<?php

namespace Modules\My\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class AsideSummary extends Component
{

    public string $title = '';




    public function radioButtons(): object
    {
        return collect([
            (object)[
                'id' => 1,
                'title' => 'За месяц'
            ],
            (object)[
                'id' => 2,
                'title' => 'За год'
            ]
        ]) ;

    }

    public function mount($title = '') {
       $this->title = $title;
    }

    public function render(): View
    {
        return view('my::livewire.aside-summary',[
            'radioButtons' => $this->radioButtons(),
            'title' => $this->title
        ]);
    }
}
