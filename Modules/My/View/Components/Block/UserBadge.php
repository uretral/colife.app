<?php

namespace Modules\My\View\Components\Block;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class UserBadge extends Component
{

    public string $avatar;

    public function __construct($avatar)
    {
        $this->avatar = $avatar;
    }

    public function render(): View
    {
        return view('my::components.block.user-badge');
    }
}
