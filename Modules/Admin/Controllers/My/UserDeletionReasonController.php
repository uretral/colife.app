<?php

namespace Modules\Admin\Controllers\My;

use Modules\Admin\Controllers\AdminController;
use Modules\My\Entities\UserDeleteReason;

use Encore\Admin\Form;

class UserDeletionReasonController extends AdminController
{

    public function __construct()
    {
        $this->model = UserDeleteReason::class;
        $this->title = 'admin.articles.title';
    }


    function setGrid()
    {
    }



    function setForm()
    {
        $this->setTranslations();
    }

    function setShow()
    {
        $this->show->field('intro', trans('admin.common.intro'));
        $this->show->field('text', trans('admin.common.text'));
        $this->show->field('created_at', trans('admin.common.created_at'));
        $this->show->field('updated_at', trans('admin.common.updated_at'));
    }


}
