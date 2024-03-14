<?php

namespace Modules\Admin\Controllers\My;

use Modules\Admin\Controllers\AdminController;
use Modules\My\Entities\Faq;
use Modules\My\Entities\FaqArticle;

class FaqThemeArticleController extends AdminController
{

    public function __construct()
    {
        $this->model = FaqArticle::class;
        $this->title = 'admin.menu_titles.my.faq_articles';
    }

    public function getFaq(): array
    {
        $output = [];
        foreach (Faq::all() as $item) {
            $output[$item->id] = $item->content->title;
        }
        return  $output;
    }


    function setGrid()
    {
        // TODO: Implement setGrid() method.
    }

    function setForm()
    {
        $this->form->select('faq_id')->options($this->getFaq());
        $this->setTranslations(false, true);
    }

    function setShow()
    {
        // TODO: Implement setShow() method.
    }
}
