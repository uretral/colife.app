<?php

namespace Modules\Admin\Extensions\Form;

use Encore\Admin\Form\Field;

class Writer extends Field
{
    public static $js = [
        '/assets/admin/ckeditor/ckeditor.js',
        '/assets/admin/ckeditor/adapters/jquery.js',
    ];

    protected $view = 'admin.writer';

    public function render()
    {
        $class = explode(' ', $this->getElementClassString())[0];
        $this->script = "$('textarea.{$class}.writer').ckeditor();";

        return parent::render();
    }
}
