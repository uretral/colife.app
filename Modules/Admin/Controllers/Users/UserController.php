<?php

namespace Modules\Admin\Controllers\Users;

use App\Http\Controllers\Controller;

use App\Models\User;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    use HasResourceActions;

    private string $description;
    private string $listTitle;

    public function __construct()
    {
        $this->description = (string)trans('admin.user.header_name');
        $this->listTitle = (string)trans('admin.list');
    }


    /**
     * @param $id
     * @return User
     */
    public function getCollection($id): User
    {
        return User::findOrFail($id);
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
    public function show($id, Content $content)
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
        $grid = new Grid(new User());

        $grid->actions(
            function ($actions) {
                $actions->disableView();
            }
        );

        $grid->filter(
            function ($filter) {
            }
        );

        $grid->column('id', 'ID')->filter()->sortable();
//        $grid->column('attributes.phone', trans('admin.user.phone'))->filter();
//        $grid->column('name', trans('admin.user.list_name'))->editable()->filter();
//        $grid->column('email', trans('email'))->filter();
//        $grid->column('roles.name')->display(
//            function ($grid) {
//                $collection = collect($this->getRoleNames());
//                return $collection->implode(",");
//            }
//        );

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
        $show = new Show(User::findOrFail($id));
        $show->field('id', 'ID');
        $show->field('attributes.phone', trans('admin.user.phone'));
        $show->field('name', trans('admin.name'));
        $show->field('email', trans('email'));
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
        $form = new Form(new User());

        $form->column(
            1 / 2,
            function ($form) {
                $form->html("<h3>Пользователь</h3>");
                $form->display('name');
                $form->text('email');
                $form->multipleSelect('roles', trans('admin.roles'))->options(Role::get()->pluck('name', 'id'));
                $form->datetime(trans('created_at'), trans('admin.created_at'))->disable();
                $form->html("<h3>" . __('tenant.notifications.title')  . "</h3>");
                $form->switch('attributes.cleaning',__('tenant.notifications.cleaning'));
                $form->switch('attributes.master',__('tenant.notifications.master'));
                $form->switch('attributes.sms_notification',__('tenant.notifications.sms_notice'));
                $form->switch('attributes.email_notification',__('tenant.notifications.email_notice'));
            }
        );

        $form->column(
            1 / 2,
            function (Form $form) {
                $form->html("<h3>Профиль</h3>");
                $form->text('attributes.surname', trans('admin.user.surname'));
                $form->date('attributes.bod', trans('admin.user.birthdate'));
                $form->text('attributes.phone', trans('admin.user.phone'));
                $form->text('attributes.job', trans('admin.user.job'));
                $form->multipleSelect('attributes.interests', trans('admin.user.interests'))->options(['Designer']);
                $form->text('attributes.telegram', trans('admin.user.telegram'));
                $form->text('attributes.facebook', trans('admin.user.facebook'));
            }
        );

        $form->saving(
            function (Form $form) {
                $roles = Role::find($form->roles);
                $user = User::find($form->model()->id);
                $user->syncRoles($roles);
            }
        );

        return $form;
    }

}
