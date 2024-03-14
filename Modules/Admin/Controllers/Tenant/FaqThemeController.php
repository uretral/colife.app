<?php

namespace Modules\Admin\Controllers\Tenant;

use Modules\Admin\Controllers\AdminController;
use Modules\Lk\Entities\Faq;
use Encore\Admin\Controllers\HasResourceActions;

class FaqThemeController extends AdminController
{
    use HasResourceActions;

    public function __construct()
    {
        $this->model = Faq::class;
        $this->title = 'admin.menu_titles.tenant.faq_themes';
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
