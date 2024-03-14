<?php

namespace Modules\Admin\Controllers\Roles;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class PermissionController extends Controller
{
    use HasResourceActions;

    private string $description;
    private string $listTitle;

    public function __construct()
    {
        $this->description = (string)trans('admin.permissions');
        $this->listTitle = (string)trans('admin.permissions');
    }


    /**
     * @param $id
     * @return Permission
     */
    public function getCollection($id): Permission
    {
        return Permission::findOrFail($id);
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
    public function show($id, Content $content): Permission
    {
        return $content
            ->header($this->getCollection($id)->name)
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
            ->header($this->getCollection($id)->name)
            ->description($this->description)
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content): Content
    {
        return $content
            ->header(trans('admin.create'))
            ->description($this->description)
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid(): Grid
    {
        $grid = new Grid(new Permission());

        $grid->actions(
            function ($actions) {
                $actions->disableView();
            }
        );

        $grid->filter(
            function ($filter) {
            }
        );

        $grid->column('id', 'ID');
        $grid->column('name', trans('admin.create'))->editable();


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
        $show = new Show(Permission::findOrFail($id));
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
        $form = new Form(new Permission());

        $form->tab(
            trans('admin.all'),
            function (Form $form) {
                $form->display('id');
                $form->display('name');
                $form->datetime(trans('created_at'), 'Создан')->disable();
            }
        );

        return $form;
    }

}


/*
product_id
 */
