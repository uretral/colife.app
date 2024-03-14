<?php

namespace Modules\Admin\Controllers\Tenant;

use Modules\Admin\Controllers\AdminController;
use Modules\Lk\Entities\BonusAnnounce;
use Modules\Lk\Entities\BonusSection;

class BonusAnnounceController extends AdminController
{


    public function __construct()
    {
        $this->model = BonusAnnounce::class;
        $this->title =  'admin.menu_titles.tenant.bonuses_announces';
    }

    function setGrid()
    {
        // TODO: Implement setGrid() method.
    }

    function setForm()
    {
        $this->form->select('bonus_section_id',__('admin.bonus-announces.sections'))
            ->options($this->selectTranslatedOptions(BonusSection::class));
        $this->setTranslations(false, true);
    }

    function setShow()
    {
        // TODO: Implement setShow() method.
    }
}
