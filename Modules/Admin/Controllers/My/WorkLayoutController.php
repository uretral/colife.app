<?php

namespace Modules\Admin\Controllers\My;

use Modules\Admin\Controllers\AdminController;
use Modules\My\Entities\WorkLayout;
use Modules\My\Entities\WorkModel;

class WorkLayoutController extends AdminController
{

    public function __construct()
    {
        $this->model = WorkLayout::class;
        $this->title = 'admin.menu_titles.my.work-layouts';
    }


    function setGrid()
    {
        $this->grid->column('code', __('admin.template'));
    }

    function setForm()
    {
        $this->form->text('code', __('admin.template'));
        $this->setTranslations();
    }

    function setShow()
    {
        $this->show->field('created_at', trans('admin.common.created_at'));
        $this->show->field('updated_at', trans('admin.common.updated_at'));
    }


}
