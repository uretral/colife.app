<?php

namespace Modules\Admin\Controllers\Tenant;

use Modules\Admin\Controllers\AdminController;
use Modules\Lk\Entities\BonusSection;
use Modules\Lk\Entities\BonusText;

class BonusTextController extends AdminController
{
    public function __construct()
    {
        $this->model = BonusText::class;
        $this->title = 'admin.menu_titles.tenant.bonuses_texts';
        $this->gridTitle = 'text';
    }

    function setGrid()
    {
        $this->grid->column('bonus_section_id', trans('admin.bonus-texts.sections'))->editable('select',$this->selectTranslatedOptions(BonusSection::class))->sortable();
    }

    function setForm()
    {
        $this->form->select('bonus_section_id', __('admin.bonus-texts.sections'))
            ->options($this->selectTranslatedOptions(BonusSection::class));
        $this->setTranslations(false, true, false);
    }

    function setShow()
    {
        // TODO: Implement setShow() method.
    }
}
