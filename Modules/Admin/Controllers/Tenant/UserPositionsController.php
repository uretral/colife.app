<?php

namespace Modules\Admin\Controllers\Tenant;

use Modules\Admin\Controllers\AdminController;
use Modules\Lk\Entities\UserPosition;

class UserPositionsController extends AdminController
{
    public function __construct()
    {
        $this->model = UserPosition::class;
        $this->title = 'admin.menu_titles.tenant.lists_areas_activity';
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
