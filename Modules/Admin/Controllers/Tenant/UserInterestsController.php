<?php

namespace Modules\Admin\Controllers\Tenant;

use Modules\Admin\Controllers\AdminController;
use Modules\Lk\Entities\UserInterest;

class UserInterestsController extends AdminController
{
    public function __construct()
    {
        $this->model = UserInterest::class;
        $this->title = 'admin.menu_titles.tenant.lists_interests';
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
