<?php

namespace Modules\Admin\Controllers\Tenant;

use Modules\Admin\Controllers\AdminController;
use Modules\Lk\Entities\BonusSection;

class BonusSectionController extends AdminController
{

    public function __construct()
    {
        $this->model = BonusSection::class;
        $this->title = 'admin.menu_titles.tenant.bonuses_sections';
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
