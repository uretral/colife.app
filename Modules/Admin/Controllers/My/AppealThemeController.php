<?php

namespace Modules\Admin\Controllers\My;

use Modules\Admin\Controllers\AdminController;
use Modules\My\Entities\AppealTheme;
use Modules\My\Entities\AppealThemePriority;

class AppealThemeController extends AdminController
{


    public function __construct()
    {
        $this->model = AppealTheme::class;
        $this->title = 'admin.menu_titles.my.appeal_themes';
    }

    function setGrid()
    {
        // TODO: Implement setGrid() method.
    }

    function setForm()
    {
        $this->form->select('priority_id', trans('admin.theme.priority'))->options($this->selectTranslatedOptions(AppealThemePriority::class));

        $this->setTranslations();
    }


    function setShow()
    {
        // TODO: Implement setShow() method.
    }


}
