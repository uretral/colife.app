<?php

namespace Modules\My\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Modules\My\Entities\Faq as Model;

class Faq extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() : View
    {
        return view('my::components.faq',[
            'faqs' => Model::with(['articles'])->get()
        ]);
    }
}
