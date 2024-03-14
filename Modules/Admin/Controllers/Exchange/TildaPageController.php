<?php

namespace Modules\Admin\Controllers\Exchange;

use App\Http\Controllers\Controller;
use App\Models\Tilda\TildaPage;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class TildaPageController extends Controller
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
     * @return TildaPage
     */
    public function getCollection($id): TildaPage
    {
        return TildaPage::findOrFail($id);
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
    public function show($id, Content $content): TildaPage
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
        $grid = new Grid(new TildaPage());

        $grid->actions(
            function ($actions) {
                $actions->disableView();
            }
        );

        $grid->filter(
            function ($filter) {
            }
        );


        $grid->column('pictures')->display(
            function ($pictures) {
                $items = collect($this->getMedia())->where('size', '>', 500042)->take(5);
                foreach ($items as $item) {
                    $pictures[] = $item->getFullUrl();
                }
                return json_decode(json_encode($pictures), true);
            }
        )->image('http://colife.loc', 100);


        $grid->column('page_id', trans('admin.page_id'));
        $grid->column('title', trans('admin.title'))->editable();
        $grid->text('texts')->display(
            function ($item) {
                return Str::limit(strip_tags($this->text), 100);
            }
        );


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
        $show = new Show(TildaPage::findOrFail($id));
        $show->field('id', 'ID');
        $show->field('text', 'Text');
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
        $form = new Form(new TildaPage());

        $form->tab(
            trans('admin.all'),
            function (Form $form) {
                $form->display('id');
                $form->display('title');
                $form->display('text');
                $form->datetime(trans('created_at'), 'Создан')->disable();
            }
        );

        $form->tab(
            'Изображения',
            function (Form $form) {
                $form->morphMany(
                    'media',
                    function (Form\NestedForm $form) {
                        $form->display('name', trans('image'));
                    }
                );
            }
        );

        return $form;
    }

}


/*
product_id
 */
