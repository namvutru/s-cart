<?php

namespace App\Admin\Controllers;


use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use App\Models\Product;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Content;
use Encore\Admin\Widgets\Table;
use Encore\Admin\Widgets\Box;
use Encore\Admin\Widgets\Collapse;
use Encore\Admin\Widgets\InfoBox;
use Encore\Admin\Facades\Admin;
use App\Models\User;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Order';


    public function index()
    {
        
        return Admin::content(function (Content $content){
            $content->header('Quản lý đơn hàng');
            

            $content->body($this->grid());
        });
    }

    public function edit($id)
    {
        return Admin::content(function (Content $content) use ($id) {

            $content->header('Chỉnh sửa đơn hàng');
            // $content->description('description');

            $content->body($this->detailOrderForm($id));
        });
    }
    

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());
        
        $grid->column('id', __('Id'));
        $grid->column('first_name', __('First name'));
        $grid->column('last_name', __('Last name'));
        $grid->column('phone_number', __('Phone number'));
        $grid->column('email', __('Email'));
        $grid->column('address', __('Address'));

        
        $grid->column('status', __('Status')) ->display(function ($status){
            $listStatus =  [1=>'New',2=> 'Processing',3=> 'Hold',4=> 'Canceled',5=> 'Done',6=> 'Failed'];
            return $listStatus[$status];
        });
        $grid->column('total', __('Total'))->display(function ($total){
            return number_format($total).' đ';
        });
        $grid->column('created_at', __('Created at'))->display(function($time){
            $carbonDate = Carbon::parse($time);
            return date_format($carbonDate, 'Y-m-d H:i:s');
        });
        $grid->column('updated_at', __('Updated at'))->display(function($time){
            $carbonDate = Carbon::parse($time);
            $now = Carbon::now();
            return $carbonDate->diffForHumans($now);
        });

        $grid->actions(function ($actions) {
            
            $actions->disableView();
        });
        $grid->disableFilter();
        $grid->disableExport();
        $grid->disableRowSelector();
        $grid->disableColumnSelector();

        $grid->disableCreateButton();


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
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('first_name', __('First name'));
        $show->field('last_name', __('Last name'));
        $show->field('phone_number', __('Phone number'));
        $show->field('email', __('Email'));
        $show->field('address', __('Address'));
        $show->field('status', __('Status'));
        $show->field('total', __('Total'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    // public function edit($id)
    // {
    //     return Admin::content(function (Content $content) use ($id) {

    //         $content->header('Chỉnh sửa đơn hàng');
    //         // $content->description('description');

    //         $content->body($this->form()->edit($id));
    //     });
    // }

    
    protected function form()
    {
        
    
        $form = new Form(new Order());
        $form->text('first_name', __('First name'));
        $form->text('last_name', __('Last name'));
        $form->text('phone_number', __('Phone number'));
        $form->email('email', __('Email'));
        $form->text('address', __('Address'));
        $form->text('status', __('Status'));
        $form->number('total', __('Total'));

        return $this->form();
    
    }

    // public function detailOrder($id)
    // {
    //     return Admin::content(function (Content $content) use ($id) {

    //         $content->header('Order #' . $id);
    //         // $content->description('description');
    //         $content->body(
    //             $this->detailOrderForm($id)
    //         );
    //     });
    // }

    public function detailOrderForm($id = null)
    {
        $order = Order::find($id);
        if ($order === null) {
            return 'no data';
        }

        $products =Product::all();
        $listitems = (new OrderDetail())->listItems($id);
        $listchangestatus= OrderStatus::where('order_id',$id)->orderBy('created_at','asc')->get(); 
        return view('admin.orderdetail')->with([
            "order" => $order,
             "products" => $products,
             'listitems' =>$listitems,
             'listchangestatus'=>$listchangestatus
            ])->render();
    }

    
}
