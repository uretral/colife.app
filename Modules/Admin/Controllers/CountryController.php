<?php

namespace Modules\Admin\Controllers;

use App\Http\Controllers\Controller;
use Encore\Admin\Widgets\Table;
use Illuminate\Support\Facades\Cookie;
use Modules\Admin\Entities\Locales;
use Modules\Admin\Entities\Country as Model;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Modules\Admin\Entities\Translation;

class CountryController extends Controller
{
    use HasResourceActions;

    private string $description;
    private string $listTitle;

    public function __construct()
    {
        $this->listTitle =  (string)__('admin.lang.title');
        $this->description = (string)__('admin.country.header_name');
    }


    /**
     * @param $id
     * @return Model
     */
    public function getCollection($id): Model
    {
        return Model::findOrFail($id);
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
        $this->id = $id;
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
        $grid = new Grid(new Model());

        $grid->actions(
            function ($actions) {
                $actions->disableView();
            }
        );

        $grid->filter(
            function ($filter) {
            }
        );

        $grid->column('id', trans('admin.common.id'))->sortable();
        $grid->column('order', trans('admin.order'))->editable()->sortable();
        $grid->column('active', trans('admin.published'))->switch()->sortable();
        $grid->column('is_default', trans('admin.default'))->bool();
        $grid->column(\App::getLocale().'.title', trans('admin.title'))->sortable();
        $grid->column('code', trans('admin.code'))->sortable()->label('default');
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
        $show = new Show(Model::findOrFail($id));

        $show->field('id', trans('admin.common.id'));
        $show->field('title', trans('admin.common.title'));
        $show->field('order', trans('admin.common.order'));
        $show->field('active', trans('admin.common.active'));
        $show->field('is_default', trans('admin.common.is_default'));
        $show->field('created_at', trans('admin.common.created_at'));
        $show->field('updated_at', trans('admin.common.updated_at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form(): Form
    {
        $form = new Form(new Model());

        $form->tools(function (Form\Tools $tools) {
            $tools->disableView();
        });

        $form->display('id');
        $form->switch('active', __('admin.common.active'))->default(true);
//        $form->switch('is_default', __('admin.common.is_default'));
        $form->number('order', __('admin.common.order'))->default(500);

        Translation::ruTitle($form, Model::class);
        Translation::enTitle($form, Model::class);

        $form->text('code', __('admin.common.code'));



        $form->image('flag', __('admin.country_flag'));

        $form->saving(function (Form $form) {
            if($form->is_default === 'on') {
                Locales::query()->update(['is_default' => 0]);
                Locales::where('code' , $form->code)->update(['is_default' => 1]);
            }
        });

        return $form;
    }

}
