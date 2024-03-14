<?php

namespace Modules\Admin\Controllers\Tenant;

use Encore\Admin\Form;
use Modules\Admin\Controllers\AdminController;
use Modules\Admin\Entities\Locales;
use Modules\Lk\Entities\Translation;

class TranslationController extends AdminController
{

    private array $routesName;

    public function __construct()
    {
        $this->model = Translation::class;
        $this->title = 'admin.menu_titles.tenant.translate_pages';
        $this->setRoutesArray();

    }

    public function setRoutesArray()
    {

        $content = file_get_contents(base_path('Modules/Lk/Routes/web.php'));
        preg_match_all('/(?<=view\(\'lk::)(.+)(?=\'\)\))/', $content, $results);

        $array = [];
        $array['common'] = 'common';

        foreach ($results[1] as $val) {
            $array[$val] = $val;
        }


        $transArray = Translation::all()->pluck('page')->toArray();

        $this->routesName = array_merge(array_diff($array, $transArray), array_diff($transArray, $array));
    }


    function setGrid()
    {
        $this->grid->column('page', trans('admin.common.page'))->sortable();
        $this->grid->column('description', trans('admin.common.description'));
    }

    function setForm()
    {
        if(is_numeric(request()->segment(3))) {
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
            \Artisan::call('TenantStore:locales');
        });
    }

    function setShow()
    {
        // TODO: Implement setShow() method.
    }
}
