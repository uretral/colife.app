<?php

namespace Modules\Lk\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Modules\Lk\Entities\Faq as Model;

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
        return view('lk::components.faq',[
            'faqs' => Model::whereActive(1)->with(['articles'])->get()
        ]);
    }
}
