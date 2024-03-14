<?php

namespace Modules\Admin\Controllers\Exchange;

use App\Http\Controllers\Controller;
use App\Services\Bitrix\Models\BitrixEntity;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class BitrixEntityController extends Controller
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
     * @return BitrixEntity
     */
    public function getCollection($id): BitrixEntity
    {
        return BitrixEntity::findOrFail($id);
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
    public function show($id, Content $content): BitrixEntity
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
        $grid = new Grid(new BitrixEntity());

        $grid->actions(
            function ($actions) {
                $actions->disableView();
            }
        );

        $grid->filter(
            function ($filter) {
            }
        );

        $grid->column('title', trans('admin.title'))->sortable();
        $grid->column('type.title', trans('admin.EntityType'));
        $grid->column('updated_at', trans('admin.updated_at'));


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
        $show = new Show(BitrixEntity::findOrFail($id));
        $show->field('id', 'ID');
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
        $form = new Form(new BitrixEntity());

        $form->tab(
            trans('admin.all'),
            function (Form $form) {
                $form->display('id');
                $form->display('title');
                $form->display('descr');
                $form->datetime(trans('created_at'), 'Создан')->disable();
            }
        );

        return $form;
    }

}


/*
product_id
 */
