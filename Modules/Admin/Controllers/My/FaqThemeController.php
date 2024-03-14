<?php

namespace Modules\Admin\Controllers\My;

use Illuminate\Support\Facades\Cookie;
use Modules\Admin\Controllers\AdminController;
use Modules\My\Entities\Faq;
use Encore\Admin\Controllers\HasResourceActions;

class FaqThemeController extends AdminController
{
    use HasResourceActions;

    public function __construct()
    {
//        $cookie = Cookie::get();
//        dump($cookie);
        dump(\cookie()->get('country'));
        $this->model = Faq::class;
        $this->title = 'admin.menu_titles.my.faq_themes';
    }

    function setGrid()
    {
        // TODO: Implement setGrid() method.
    }

    function setForm()
    {
        $this->setTranslations();
    }

    function setShow()
    {
        // TODO: Implement setShow() method.
    }
}
