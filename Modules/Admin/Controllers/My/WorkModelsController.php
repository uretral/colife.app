<?php

namespace Modules\Admin\Controllers\My;

use Modules\Admin\Controllers\AdminController;
use Modules\My\Entities\Article;

use Encore\Admin\Form;
use Modules\My\Entities\WorkLayout;
use Modules\My\Entities\WorkModel;

class WorkModelsController extends AdminController
{

    public function __construct()
    {
        $this->model = WorkModel::class;
        $this->title = 'admin.my.lists.work-models';
    }


    function setGrid()
    {
        $this->grid->column('code', __('admin.common.bx_24_code'))->editable();
        $this->grid->column('view', __('admin.template'))->editable('select', WorkLayout::whereActive(1)->orderBy('order')->pluck('code','view')->toArray());
    }

    function setForm()
    {
        $this->form->text('code', __('admin.common.bx_24_code'));
        $this->form->select('view', __('admin.template'))
            ->options(WorkLayout::whereActive(1)->orderBy('order')->pluck('code','view')->toArray());
        $this->setTranslations();
    }

    function setShow()
    {
        $this->show->field('created_at', trans('admin.common.created_at'));
        $this->show->field('updated_at', trans('admin.common.updated_at'));
    }


}
