<?php

namespace Modules\Admin\Controllers\Tenant;

use Modules\Admin\Controllers\AdminController;
use Modules\Lk\Entities\Article;

class ArticleController extends AdminController
{
    public function __construct()
    {
        $this->model = Article::class;
        $this->title =  'admin.menu_titles.tenant.articles';

    }

    function setGrid()
    {
        // TODO: Implement setGrid() method.
    }

    function setForm()
    {
        $this->form->image('image', __('admin.common.image'))->move('articles');
        $this->setTranslations(true, true);
    }

    function setShow()
    {
        // TODO: Implement setShow() method.
    }
}
