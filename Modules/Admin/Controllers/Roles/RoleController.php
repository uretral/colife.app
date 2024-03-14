<?php

namespace Modules\Admin\Controllers\Roles;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class RoleController extends Controller
{
    use HasResourceActions;

    private string $description;
    private string $listTitle;

    public function __construct()
    {
        $this->description = (string)trans('admin.roles');
        $this->listTitle = (string)trans('admin.roles');
    }


    /**
     * @param $id
     * @return Role
     */
    public function getCollection($id): Role
    {
        return Role::findOrFail($id);
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
    public function show($id, Content $content): Role
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
        $grid = new Grid(new Role());

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
        $grid->column('name', trans('admin.permission'))->editable();


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
        $show = new Show(Role::findOrFail($id));
        $show->field('id', 'ID');
        $show->field('name', 'name');
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
        $form = new Form(new Role());

        $form->tab(
            trans('admin.all'),
            function (Form $form) {
                $form->display('id');
                $form->text('name')->options(['autocomplete' => 'off']);
                $form->datetime(trans('created_at'), trans('created'));
            }
        );

        return $form;
    }

}


/*
product_id
 */
