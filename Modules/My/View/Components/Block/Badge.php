<?php

namespace Modules\My\View\Components\Block;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Badge extends Component
{
    public function render(): View
    {
        return view('my::components.block.badge');
    }
}
