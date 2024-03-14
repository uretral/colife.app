<?php

namespace Modules\Admin\Controllers\Tenant;

use Modules\Admin\Controllers\AdminController;
use Modules\Lk\Entities\AppealThemePriority;

class AppealThemePriorityController extends AdminController
{
    public function __construct()
    {
        $this->model = AppealThemePriority::class;
        $this->title = 'admin.menu_titles.tenant.appeal_priority';
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
