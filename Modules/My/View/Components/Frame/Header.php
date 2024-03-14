<?php

namespace Modules\My\View\Components\Frame;

use App\Models\Locales;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Modules\My\Repositories\UserRepository;

class Header extends Component
{
//    public bool $authorized;
//    public $locales;


    public function __construct()
    {
//        dd('asasasas');
//        $this->authorized = $authorized;
//        $this->locales = Locales::all();
    }

    public function render(): View
    {


        return view('my::components.frame.header',[
            "user" => UserRepository::getAuthUser(),
            'locales' => Locales::all(),
//            'notifications' => UserRepository::hasNotifications()
        ]);
    }
}
