<?php

namespace Modules\Admin\Controllers\My;

use Modules\Admin\Controllers\AdminController;

use Encore\Admin\Form;
use Modules\My\Entities\Expense;

class ExpensesController extends AdminController
{

    public function __construct()
    {
        $this->model = Expense::class;
        $this->title = 'admin.menu_titles.my.expenses_type';
    }


    function setGrid(){
        $this->grid->column('slug',trans('admin.slug'));
        $this->grid->column('color')->display(function ($color){
            return "<span style='color:".$color."'>$color</span>";
        });
    }

    function setForm()
    {
        $this->form->text('slug',trans('admin.slug'));
        $this->form->color('color', trans('admin.color'));
        $this->setTranslations();
    }

    function setShow()
    {
        $this->show->field('created_at', trans('admin.common.created_at'));
        $this->show->field('updated_at', trans('admin.common.updated_at'));
    }


}
