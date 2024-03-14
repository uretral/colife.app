<?php

namespace Modules\Admin\Controllers\Tenant;

use Modules\Admin\Controllers\AdminController;
use Modules\Lk\Entities\UserDeleteReason;

class UserDeleteReasonsController extends AdminController
{


    public function __construct()
    {
        $this->model = UserDeleteReason::class;
        $this->title = 'admin.menu_titles.tenant.lists_reasons_deletion';
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
