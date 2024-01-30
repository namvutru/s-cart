<?php

namespace App\Http\Controllers;

use App\Models\OrderDetail;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{
    //
    public function update(Request $request){

        $data = $request->all();
        $column = $request->get('name');
        $id = $request->get('pk');
        $value =$request->get('value');
       

        $item = OrderDetail::find($id);
        $order =  Order::find($item->order_id);

        $subtotal =  $order->total;

        $total_item_old = $item->price*$item->qty;


        $item->$column = $value;
        $item->save();

        $total_item_new = $item->price*$item->qty;


        $subtotal =  $subtotal- $total_item_old +$total_item_new;

        $order->total = $subtotal;
        $order->save();

        
        


        

      

        return response()->json(
            [
                'data'=> $data,
                'total'=> $item->price*$item->qty,
                'subtotal'=>$subtotal,
                'id'=>$id,

                'error'=> 0,
                'msg'=>'update successfully',
                
            ]
        );


    }

    public function delete(Request $request){
        $id = $request->get('id');
        $item = OrderDetail::find($id);


        $order =  Order::find($item->order_id);

        $subtotal =  $order->total;

        $total_item = $item->price*$item->qty;

        $subtotal =  $subtotal- $total_item;

        $order->total = $subtotal;
        $order->save();
        if($item->delete())
        return response()->json(
            [

                
                'error'=> 0,
                'msg'=>'Delete item successfully',
                
            ]
        );
        else{
            return response()->json(
                [

                    'error'=> 1,
                    'msg'=>'Delete item fail',
                    
                ]
            );
           

        }
    }


   
}
