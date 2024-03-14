<?php

namespace Modules\Admin\Controllers\Exchange;

use App\Http\Controllers\Controller;
use App\Services\Bitrix\Models\BitrixEntity;
use App\Services\Bitrix\Models\BitrixFields;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class BitrixFieldsController extends Controller
{
    use HasResourceActions;

    private string $description;
    private string $listTitle;

    public function __construct()
    {
        $this->description = (string)trans('admin.list');
        $this->listTitle = (string)trans('admin.list');
    }


    /**
     * @param $id
     * @return BitrixFields
     */
    public function getCollection($id): BitrixFields
    {
        return BitrixFields::findOrFail($id);
    }


    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content): Content
    {
        return $content
            ->header($this->listTitle)
            ->description($this->description)
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content): Content
    {
        return $content
            ->header($this->getCollection($id)->title)
            ->description($this->description)
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content): Content
    {
        return $content
            ->header($this->getCollection($id)->title)
            ->description($this->description)
            ->body($this->form()->edit($id));
    }


    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        $grid = new Grid(new BitrixFields());

        $grid->actions(
            function ($actions) {
                $actions->disableEdit();
                $actions->disableDelete();
            }
        );

        $grid->filter(
            function ($filter) {
                //$filter->scope()->BitrixEntity::get()->pluck('title')->toArray()
            }
        );

        $grid->column('is_dynamic', trans('admin.is_dynamic'))->switch();
        $grid->column('title', trans('admin.title'))->sortable()->filter('like');
        $grid->column('ext_entity_type_id', trans('admin.Entity'))
            ->filter(
                BitrixEntity::get()->pluck('title', "ext_entity_type_id")
                    ->toArray()
            );
        $grid->column('upper_name', trans('admin.field_name'))->sortable()->filter('like');


        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail(mixed $id): Show
    {
        $show = new Show(BitrixFields::findOrFail($id));
        $show->field('id', 'ID');
        $show->title();
        $show->payload()->as(
            function ($content) {
                $data = '';
                foreach ($content as $title => $item) {
                    if (is_string($item) && !empty($item)) {
                        $data .= $title . ": " . $item . ' / ';
                    }
                }
                return $data;
            }
        );

        $show->field('created_at', trans('admin.created_at'));
        $show->field('updated_at', trans('admin.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        $form = new Form(new BitrixFields());

        $form->tab(
            trans('admin.all'),
            function (Form $form) {
                $form->display('id');
                $form->display('title');
                //$form->display('payload');
                $form->datetime(trans('created_at'), trans('admin.created_at'))->disable();
            }
        );

        return $form;
    }

}


/*
product_id
 */
