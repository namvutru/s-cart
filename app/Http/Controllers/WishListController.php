<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use View;


class WishListController extends Controller
{
    public function addToWishList(Request $request)
    {

        if(!Auth::check()){
            return response()->json(
                [
                    'error' => 1,
                    'msg'=>'You are not logged in',

                ]
            );
        }
        
        
        $id = $request->get('id');
        
        $product  = Product::find($id);
        $wishlist = Cart::instance('wishlist')->content();

        foreach($wishlist as $item){
            if( $item->id == $id )  
            return response()->json(
                [
                    'error' => 1,
                    'msg'=>'The product is already in the wishlist',

                ]
            );
        }

        Cart::instance('wishlist')->add(
            array(
                'id'    =>$id,
                'name'  => $product->name ,
                'qty'   => 1,
                'price' =>$product->price,
            )
        );

        Cart::instance('wishlist')->store(Auth::user()->id);

        return response()->json(
            [
                'error' => 0,
                'msg'=>'Add to wishlist successfully',
            ]
        );

    }
       

    public function removetoWishList($id){

        
         
        Cart::instance('wishlist')->remove($id);

        Cart::instance('wishlist')->store(Auth::user()->id);
        return redirect('wishlist');
    }
}
