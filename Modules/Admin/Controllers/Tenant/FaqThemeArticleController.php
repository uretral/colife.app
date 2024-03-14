<?php

namespace Modules\Admin\Controllers\Tenant;

use Modules\Admin\Controllers\AdminController;
use Modules\My\Entities\FaqArticle;

class FaqThemeArticleController extends AdminController
{

    public function __construct()
    {
        $this->model = FaqArticle::class;
        $this->title = 'admin.menu_titles.tenant.faq_articles';
    }


    function setGrid()
    {
        // TODO: Implement setGrid() method.
    }

    function setForm()
    {
        $this->setTranslations(false, true);
    }

    function setShow()
    {
        // TODO: Implement setShow() method.
    }
}
