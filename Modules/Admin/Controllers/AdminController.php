<?php

namespace Modules\Admin\Controllers;

use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Modules\Admin\Entities\Locales;
use Modules\Lk\Entities\BonusSection;

abstract class AdminController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, HasResourceActions;

    protected string $model;
    protected array $columns;
    protected bool $hasLocale = true;
    /* title */
    protected string $title;
    /* Grid */
    protected string $gridTitle = 'title';
    protected Grid $grid;
    protected Form $form;
    protected Show $show;

    abstract function setGrid();

    abstract function setForm();

    abstract function setShow();

    public function getCollection($id)
    {
        return $this->model::findOrFail($id);
    }

    public function index(Content $content): Content
    {
        $this->grid = $this->grid();

        return $content
            ->header(__('admin.list'))
            ->description(__($this->title))
            ->body($this->grid);
    }

    public function show($id, Content $content)
    {
        return $content
            ->header($this->getCollection($id)->name)
            ->description($this->title)
            ->body($this->detail($id));
    }

    public function edit($id, Content $content): Content
    {

        return $content
            ->header(__($this->title) . ' - ' . __('admin.edit'))
            ->description($this->model::with([\App::getLocale()])->find($id)->{\App::getLocale()}->title ?? '')
            ->body($this->form()->edit($id));
    }

    public function create(Content $content): Content
    {
        return $content
            ->header($this->title)
            ->description(trans('admin.create'))
            ->body($this->form());
    }

    protected function grid(): Grid
    {
        $this->columns();
        $this->grid = new Grid(new $this->model);

        $this->grid->actions(
            function ($actions) {
                $actions->disableView();
            }
        );

        $this->grid->column('id', trans('admin.common.id'))->sortable();

        if ($this->hasLocale) {

            $this->grid->column(
                \App::getLocale() . '.' . $this->gridTitle, __('admin.common.title'))
                ->limit(75)->sortable();

        } else {

            $this->grid->column('title', trans('admin.common.title'))->sortable();

        }


        $this->setGrid();

        if (in_array('order', $this->columns))
            $this->grid->column('order', trans('admin.common.order'))->editable()->sortable();
        if (in_array('active', $this->columns))
            $this->grid->column('active', trans('admin.common.active'))->switch()->sortable();


        return $this->grid;
    }

    protected function detail(mixed $id): Show
    {
        $this->show = new Show($this->model::findOrFail($id));

        $this->show->field('id', trans('admin.common.id'));
        $this->show->field('title', trans('admin.common.title'));
        $this->show->field('order', trans('admin.common.order'));
        $this->show->field('active', trans('admin.common.active'));

        $this->setShow();

        return $this->show;
    }

    public function columns()
    {
        $model = new $this->model;
        $table = $model->getTable();
        $this->columns = $model->getConnection()->getSchemaBuilder()->getColumnListing($table);
    }


    protected function form(): Form
    {
        $this->columns();

        $this->form = new Form(new $this->model);

        $this->form->tools(function (Form\Tools $tools) {
            $tools->disableView();
        });

        $this->form
            ->tab(trans('admin.common.tabs.content'), function (Form $form) {
                if (in_array('title', $this->columns))
                    $form->hidden('title', trans('admin.common.title_tech'))->default('no title');
                if (in_array('country_code', $this->columns))
                    $form->hidden('country_code', trans('admin.common.title_tech'))->default(\Cookie::get('country'));
                $this->setForm();
            })
            ->tab(trans('admin.common.tabs.settings'), function (Form $form) {
                if (in_array('id', $this->columns))
                    $form->display('id');
                if (in_array('active', $this->columns))
                    $form->switch('active', __('admin.common.active'))->default(true);
                if (in_array('order', $this->columns))
                    $form->number('order', __('admin.common.order'))->default(500);
                if (in_array('created_at', $this->columns))
                    $form->datetime('created_at', __('admin.common.created_at'))->disable();
                if (in_array('updated_at', $this->columns))
                    $form->datetime('updated_at', __('admin.common.updated_at'))->disable();
            });

        return $this->form;
    }

    protected function setTranslations($intro = false, $text = false, $title = true, $fileDir = '')
    {
        $this->form->hasMany('contentAdmin', trans('admin.common.translated'), function (Form\NestedForm $form) use ($intro, $text, $title, $fileDir) {
            $form->select('locale', __('admin.common.locale'))
                ->options(Locales::orderBy('order')->pluck('code', 'code')->toArray());
            $form->hidden('model')->default($this->model);
            if ($title)
                $form->text('title', __('admin.common.title'));
            if ($intro)
                $form->textarea('intro', __('admin.common.intro'));
            if ($text)
                $form->writer('text', __('admin.common.text'));
            if ($fileDir)
                $form->file('file', __('admin.common.file'))->move($fileDir);

        })->mode($text ? 'default' : 'table');
    }

    protected function selectTranslatedOptions(string $model)
    {
        return \Modules\Lk\Entities\Content::whereIn('parent_id', $model::whereActive(1)->get()->pluck('id'))
            ->whereModel($model)->whereLocale(\App::getLocale())->pluck('title', 'parent_id');

    }

}
