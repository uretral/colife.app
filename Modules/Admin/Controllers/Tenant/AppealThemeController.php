<?php

namespace Modules\Admin\Controllers\Tenant;

use Modules\Admin\Controllers\AdminController;
use Modules\Lk\Entities\AppealTheme;
use Modules\Lk\Entities\AppealThemePriority;

class AppealThemeController extends AdminController
{


    public function __construct()
    {
        $this->model = AppealTheme::class;
        $this->title = 'admin.menu_titles.tenant.chat_themes';
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
