<?php

namespace Modules\Admin\Controllers\My;

use Modules\Admin\Controllers\AdminController;
use Modules\Admin\Entities\Locales;
use Modules\My\Entities\Translation;
use Modules\My\Entities\Translation as Model;
use Encore\Admin\Form;

class TranslationController extends AdminController
{

    private array $routesName;

    public function __construct()
    {
        $this->model = Translation::class;
        $this->title = 'admin.menu_titles.my.translate_pages';
        $this->setRoutesArray();
    }


    public function setRoutesArray()
    {

        $content = file_get_contents(base_path('Modules/My/Routes/web.php'));
        preg_match_all('/(?<=view\(\'my::)(.+)(?=\'\)\))/', $content, $results);

        $array = [];
        $array['common'] = 'common';
        $array['menu'] = 'menu';
        $array['summary'] = 'summary';
        $array['estate'] = 'estate';
        $array['auth'] = 'auth';

        foreach ($results[1] as $val) {
            $array[$val] = $val;
        }


        $transArray = Model::all()->pluck('page')->toArray();


//        $this->routesName = array_merge(array_diff($array, $transArray), array_diff($transArray, $array));
        $this->routesName = array_diff($array, $transArray);
    }


    function setGrid()
    {
        $this->grid->column('page', trans('admin.common.page'))->sortable();
        $this->grid->column('description', trans('admin.common.description'));
    }

    function setForm()
    {
        if (is_numeric(request()->segment(2))) {
            $this->form->text('page', __('admin.common.page'))->disable();
        } else {
            $this->form->select('page', __('admin.common.page'))->options($this->routesName);
        }


        $this->form->text('description', __('admin.common.description'));

        $this->form->table('translation', __('admin.translation.header_name'), function ($table) {
            $table->text('key', __('admin.translation.key'));
            foreach (Locales::all() as $locale) {
                $table->textarea($locale->code)->rows(1)->attribute(['style' => 'resize: vertical']);
            }
        });


        $this->form->datetime('created_at', __('admin.common.created_at'))->disable();
        $this->form->datetime('updated_at', __('admin.common.updated_at'));

        $this->form->saved(function (Form $form) {
            \Artisan::call('MyStore:myLocales');
        });
    }

    function setShow()
    {
        // TODO: Implement setShow() method.
    }

}
