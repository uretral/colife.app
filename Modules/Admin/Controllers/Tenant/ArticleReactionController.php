<?php

namespace Modules\Admin\Controllers\Tenant;


use Modules\Admin\Controllers\AdminController;
use Modules\Lk\Entities\ArticleReaction;

class ArticleReactionController extends AdminController
{

    public function __construct()
    {
        $this->model = ArticleReaction::class;
        $this->title = (string)__('admin.menu_titles.tenant.users_reactions');
        $this->hasLocale = false;
    }

    function setGrid()
    {
        $this->grid->column('icon', trans('admin.common.icon'))->image();
    }

    function setForm()
    {
        $this->form->text('title', __('admin.common.title_tech'));
        $this->form->image('icon', __('admin.common.icon'))->move('reactions');
    }

    function setShow()
    {
        // TODO: Implement setShow() method.
    }
}
