<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Carbon;

class CategoryController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Category';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Category());

        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('name_en', __('Name English'));

        $grid->column('slug', __('Slug'))->editable();

        $grid->column('parent', __('Category Parent'))->display(function($parent_id){
            $parent= Category::find($parent_id);
            if($parent) return $parent->name;
            else return "";
        });
        $grid->column('image', __('Image'))->image();
        $grid->status('status', __('Status'))->switch();
        $grid->column('created_at', __('Created at'))->display(function($time){
            $carbonDate = Carbon::parse($time);
            return date_format($carbonDate, 'Y-m-d H:i:s');
        });
        $grid->column('updated_at', __('Updated at'))->display(function($time){
            $carbonDate = Carbon::parse($time);
            return date_format($carbonDate, 'Y-m-d H:i:s');
        });
        $grid->actions(function ($actions) {
            
            
            $actions->disableView();
        });
        $grid->disableFilter();
        $grid->disableExport();
        $grid->disableRowSelector();
        $grid->disableColumnSelector();


        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Category::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('image', __('Image'));
        $show->field('status', __('Status'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Category());

        $form->text('name', __('Name'));
        $form->text('name_en', __('Name English'));
        $listCate = (new Category())->listCateTwoLever();
        $form->select('parent', __('Category Parent'))->options($listCate)->default(0);
        $form->text('slug', __('Slug'));
        $form->image('image', __('Image'))->uniqueName()->move('category');
        $form->switch('status', __('Status'));

        return $form;
    }
}
