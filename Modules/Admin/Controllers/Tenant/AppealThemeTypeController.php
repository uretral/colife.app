<?php

namespace Modules\Admin\Controllers\Tenant;

use Modules\Admin\Controllers\AdminController;
use Modules\My\Entities\AppealThemeType;
use Modules\Lk\Entities\AppealTheme;
use Modules\Lk\Entities\AppealThemePriority;

class AppealThemeTypeController extends AdminController
{

    public function __construct()
    {
        $this->model = AppealThemeType::class;
        $this->title = 'admin.menu_titles.tenant.chat_types';
    }

    public function getThemes(): array
    {
        $output = [];
        foreach (AppealTheme::all() as $item) {
            $output[$item->id] = $item->content->title;
        }
        return  $output;
    }

    function setGrid()
    {
        $title = $this->getThemes();
        $this->grid->column('theme_id', trans('admin.menu_titles.tenant.appeal_theme'))
            ->display(fn($theme_id) => "<span>".$title[$theme_id]. "</span>");
        $this->grid->column('priority_id', trans('admin.theme.priority'))
            ->editable('select', $this->selectTranslatedOptions(AppealThemePriority::class))->sortable();
    }

    function setForm()
    {
/*        $this->form->select('priority_id', trans('admin.theme.priority'))
            ->options($this->selectTranslatedOptions(AppealThemePriority::class));*/
        $this->form->select('theme_id', trans('admin.menu_titles.tenant.appeal_theme'))->options($this->getThemes());
        $this->setTranslations();
    }

    function setShow()
    {
        // TODO: Implement setShow() method.
    }
}
