<?php

namespace Modules\My\View\Components\Frame;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Section extends Component
{
    public function render(): View
    {
        return view('my::components.frame.section');
    }
}
