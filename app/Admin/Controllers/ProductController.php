<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Brand;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Carbon\Carbon;






class ProductController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Product';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Product());

        
        $grid->quickSearch(function ($model, $query) {
            $model->where('name', 'like', "%{$query}%")->orwhere('slug', 'like', "%{$query}%");
        })->placeholder('Search name, slug');
       
        $grid->column('id', __('Id'));
        $grid->column('name', __('Name'));
        $grid->column('slug', __('Slug'))->editable();
        $grid->column('image', __('Image'))->image();
        $grid->column('price', __('Price'));
        $grid->column('old_price', __('Old Price'));
        $grid->column('quantity', __('Quantity'));
        $grid->column('code', __('Code'));
        // $grid->column('description', __('Description'));
        $grid->hot(__('Hot'))->switch();
        $grid->status(__('Status'))->switch();
        $grid->column('category_id', __('Category'))->display(function ($category_id){
            
            $category= Category::find($category_id);
            if($category){
                return $category->name;
            }else{
                return "";
            }
            
        });
        $grid->column('brand_id', __('Brand'))->display(function ($brand_id){
            $brand= Brand::find($brand_id);
            if(isset($brand))
                return $brand->name;
            else
                return "";
        });
        $grid->column('created_at', __('Created at'))
        ->display(function($time){
            $carbonDate = Carbon::parse($time);
            return date_format($carbonDate, 'Y-m-d H:i:s');
        });
        $grid->column('updated_at', __('Updated at'))
        ->display(function($time){
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
        $show = new Show(Product::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('name', __('Name'));
        $show->field('image', __('Image'));
        $show->field('price', __('Price'));
        $show->field('quantity', __('Quantity'));
        $show->field('code', __('Code'));
        $show->field('description', __('Description'));
        $show->field('hot', __('Hot'));
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
        $form = new Form(new Product());
        
        $form->tab('Product info', function ($form) {

            

            $form->text('name', __('Name'));
            $form->text('slug', __('Slug'))->required();;
            $form->image('image', __('Image'))->uniqueName()->move('product');;
            $form->number('price', __('Price'));
            $form->number('old_price', __('Old_Price'));
            $listCate = (new Category())->listCateTwoLever();
            $form->select('category_id', __('Category'))->options( $listCate);

            $listBrand = (new Brand())->listBrand();
            $form->select('brand_id', __('Brand'))->options( $listBrand);

            $form->number('quantity', __('Quantity'));
            $form->text('code', __('Code'));
            $form->ckeditor('description', __('Description'));
            $form->switch('hot', __('Hot'));
            $form->switch('status', __('Status'));
        
        })->tab('Attribute', function ($form) {
        
            $form->hasMany('attributes', function (Form\NestedForm $form) {
                $list_style_attribute= [
                    1 => "Color",
                    2 => "Size"
                ];
             
                $form->text('name_attribute');
                $form->number('price');
                $form->select('style_attribute')->options($list_style_attribute);
            });
        
        });
       
       
        
        
        
        return $form;
    }
}
