<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use App\Models\Order;


use App\Models\Attribute;
use App\Models\Category;
use App\Models\OrderDetail;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use View;



class CartController extends Controller
{
    //
    public function addToCart(Request $request)
    {

        $instance = empty($request->get('instance')) ? 'default' : $request->get('instance');
        $id       = $request->get('id');
        $qty       = $request->get('qty');
        
        $product  = Product::find($id); 

        $listcart = Cart::instance('shoppingcart')->content();
        $listproduct=[];

        $listquantity=[];

        foreach($listcart as $key=> $item){
            $pro = Product::find($item->id); 
            if(isset($listquantity[$pro->id] )){
                $listquantity[$pro->id] += $item->qty;
            }else{
                $listquantity[$pro->id] = $item->qty;
            }


            
            $listproduct[$item->id] = $pro;
        }

        // dd($listquantity);


        if(isset($listquantity[$product->id])){

            if($listquantity[$product->id] + $qty> $product->quantity ){


                if (!$request->ajax()) {
                    return redirect()->back()->with('type','error')->with('message','The selected quantity is greater than the remaining product quantity');
                }else{
    
                    return response()->json(
                        [
                            'msg'=>'The selected quantity is greater than the remaining product quantity',
                            'error'=> 1,
                        ]
                    );
    
                }
            }

        }else{

            if($qty > $product->quantity ){


                if (!$request->ajax()) {
                    return redirect()->back()->with('type','error')->with('message','The selected quantity is greater than the remaining product quantity');
                }else{
    
                    return response()->json(
                        [
                            'msg'=>'The selected quantity is greater than the remaining product quantity',
                            'error'=> 1,
                        ]
                    );
    
                }
            }

        }


        
       


       
        
        $price=  $product->price;

        $color_id = $request->get('color');
        $size_id =   $request->get('size');
        $name = $product->name;
        if($color_id){
            $color= Attribute::find($color_id);
            $id = $id .'-'.$color->name_attribute;
            $name = $name.' - Color:'.$color->name_attribute;
            $price = $price + $color->price;
        }
        if($size_id){
            $size = Attribute::find($size_id);
            $id = $id .'-'.$size->name_attribute;
            $name = $name.' - Size:'.$size->name_attribute;
            $price = $price + $size->price;
        }

        // dd($attributes);

        Cart::instance('shoppingcart')->add(
            array(
                'id'    =>$id,
                'name'  => $name,
                'qty'   => $qty ,
                'price' => $price,
                
            )
        );
        
        if (!$request->ajax()) {
            return redirect('cart');
        }

        return response()->json(
            [
                // 'flg'        => 1,
                // 'subtotal'   => number_format(Cart::instance('shoppingcart')->subtotal()),
                'count_cart' => Cart::instance('shoppingcart')->count(),
                'error' => 0,
                'msg'=>'Add to cart successfully',
                'instance'   =>'shoppingcart' ,
            ]
        );

    }

    /**
     * [addToCart description]
     * @param Request $request [description]
     */
    public function updateToCart(Request $request)
    {
        // if (!$request->ajax()) {
        //     return redirect('/gio-hang.html');
        // }
        $id      = $request->get('id');
        $rowId   = $request->get('rowId');
        $price =  $request->get('price');
        $product = Product::find($id);
        $new_qty = $request->get('new_qty');


            

        
        if($new_qty> $product->quantity) {
            return response()->json(
                [
                    'msg'=>'The selected quantity is greater than the remaining product quantity',
                    'error'=> 1,
                ]
            );
            

        }

        // id: id,
        //             rowId: rowid,
        //             new_qty: new_qty,
        //             storeId: storeId,
        
        Cart::instance('shoppingcart')->update($rowId, ($new_qty) ? $new_qty : 0);

//            $user = Auth::user();
//            Cart::store($user->id);

        return response()->json(
            [
                'total'=>number_format($new_qty*$price).'đ',
                'error'=> 0,
            ]
        );
                    
        }
    
    public function removetoCart($id){
        Cart::instance('shoppingcart')->remove($id);
        return redirect('cart');
    }

    public function restorecart(Request $request){


        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required|min:8',
            'address' => 'required',

        ]);

        $first_name = $request->get('first_name');
        $last_name = $request->get('last_name');
        $email = $request->get('email');
        $phone = $request->get('phone');
        $address = $request->get('address');

        $order = new Order();

        $order->first_name = $first_name;
        $order->last_name = $last_name;
        $order->email= $email;
        $order->phone_number = $phone;
        $order->address  = $address ;
        $order->total = intval(str_replace(",", "", Cart::instance('shoppingcart')->subtotal())) ;
        $order->status = 1;

        $userAgent = $_SERVER['HTTP_USER_AGENT'];
        $clientIP = $_SERVER['REMOTE_ADDR'];

        $order->agent ='Agent:'. $userAgent .'|   |IP:'. $clientIP;

        $order->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
        $order->created_at = Carbon::now('Asia/Ho_Chi_Minh');
        $order->save();



        
        
        $listcart = Cart::instance('shoppingcart')->content();
        $listproduct=[];
        foreach($listcart as $key=> $item){
            $product = Product::find($item->id); 
            $product->quantity = $product->quantity - $item->qty;
            $listproduct[$item->id] = $product;
            $product->save();
        }
        
        foreach($listcart as $key=> $item){
            $orderitem =  new OrderDetail();
            $orderitem->name = $item->name;
            $orderitem->qty = $item-> qty;
            $orderitem->price = $item-> price;
            $orderitem->order_id = $order->id;
            $orderitem->product_id = $listproduct[$item->id]->id;
            $orderitem->save();
        }
        Cart::instance('shoppingcart')->destroy();

        $cartcount=  Cart::instance('shoppingcart')->count();

        return view("orders_successfully",array(
            'order'=>$order,
            'listcart'=>$listcart,
            'cartcount'=>$cartcount,
        ));

    }
}
