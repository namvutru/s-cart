<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use Carbon\Carbon;
use Encore\Admin\Facades\Admin;

class OrderController extends Controller
{
    //
    public function index(){
        $listorder = Order::all();
        return response()->json(
            [
                'listorder'=> $listorder->toArray(),
                

                'status'=>200,
                
                
            ]
        );
      
    }

    public function update(Request $request){



        // $data = $request->all();

        $column = $request->get('name');

        $id = $request->get('pk');
        $value =$request->get('value');

        if($column == 'status'){
            $orderstatuschange = new OrderStatus();
            $listStatus =  [1=>'New',2=> 'Processing',3=> 'Hold',4=> 'Canceled',5=> 'Done',6=> 'Failed'];
            $orderstatuschange->change = $listStatus[$value];
            $orderstatuschange->user_id =auth()->user()->id;
            $orderstatuschange->user_name = auth()->user()->name;
            $orderstatuschange->order_id = $id;
            $orderstatuschange->updated_at = Carbon::now('Asia/Ho_Chi_Minh');
            $orderstatuschange->created_at = Carbon::now('Asia/Ho_Chi_Minh');
            $orderstatuschange->save();
            
        }

        $order = Order::find($id);
        $order->$column = $value;
        $order->save();
        

        // $item = OrderDetail::find($id);

        return response()->json(
            [
                'data'=> $order->toArray(),
                

                'error'=> 0,
                'msg'=>'update successfully',
                
            ]
        );


    }

    public function show($id){
        $order  = Order::find($id);

        if($order){
            $listitem = OrderDetail::where('order_id',$id)->get();
            return response()->json([
                'data' => $order->toArray(), 
                'listitem' => $listitem->toArray(),         
                'status' => 200,
            ]);

        }else{
            return response()->json([
                'message' => "This order not found",          
                'status' => 400,
            ]);
        }
        

    }
    public function destroy($id){
        $order = Order::find($id);
        if($order ){
            if($order->delete()){
                $listitem = OrderDetail::where('order_id',$id)->get();
                foreach($listitem as $item){
                    $item->delete();
                }
                return response()->json([
                    'message' => "Delete this order successfully",          
                    'status' => 200,
                ]);
            }else{
                return response()->json([
                    'message' => "Delete this order fail",          
                    'status' => 400,
                ]);
                
            }
        }else{
            return response()->json([
                'message' => "This order not found",          
                'status' => 400,
            ]);
        }
    }

    public function getChangestatus(Request $request,$id){
        $listchangestatus= OrderStatus :: where('order_id',$id) -> orderBy('created_at','asc')->get();
        return response()->json([
            'listchangestatus' => $listchangestatus->toArray(),          
            'status' => 200,
        ]);

    }
}
