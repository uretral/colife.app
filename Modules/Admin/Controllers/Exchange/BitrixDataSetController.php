<?php

namespace Modules\Admin\Controllers\Exchange;

use App\Http\Controllers\Controller;
use App\Services\Bitrix\Models\BitrixDataSet;
use App\Services\Bitrix\Models\BitrixEntity;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class BitrixDataSetController extends Controller
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
     * @return BitrixDataSet
     */
    public function getCollection($id): BitrixDataSet
    {
        return BitrixDataSet::findOrFail($id);
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
        $grid = new Grid(new BitrixDataSet());

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

        $grid->column('title', trans('admin.title'))->sortable()->filter('like');;
        $grid->column('entity_id', trans('admin.Entity'))
            ->filter(
                BitrixEntity::get()->pluck('title', "id")
                    ->toArray()
            );
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
        $show = new Show(BitrixDataSet::findOrFail($id));
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
        $form = new Form(new BitrixDataSet());

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
