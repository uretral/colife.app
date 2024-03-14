<?php

namespace Modules\Admin\Controllers\Tenant;

use Modules\Admin\Controllers\AdminController;
use Modules\Lk\Entities\Document;

class DocumentController extends AdminController
{
    public function __construct()
    {
        $this->model = Document::class;
        $this->title =  'admin.menu_titles.tenant.download_docs';
    }

    function setGrid()
    {
        // TODO: Implement setGrid() method.
    }

    function setForm()
    {
        $this->setTranslations(false, false, true, 'docs');
    }

    function setShow()
    {
        // TODO: Implement setShow() method.
    }
}
