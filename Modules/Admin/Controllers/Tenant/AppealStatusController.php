<?php

namespace Modules\Admin\Controllers\Tenant;

use Modules\Admin\Controllers\AdminController;
use Modules\Lk\Entities\AppealStatus;

class AppealStatusController extends AdminController
{

    public function __construct()
    {
        $this->model = AppealStatus::class;
        $this->title = (string)trans('admin.menu_titles.tenant.chat_statuses');
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
