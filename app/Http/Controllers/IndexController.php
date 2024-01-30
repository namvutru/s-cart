<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\User;
use App\Models\Brand;
use Carbon\Carbon;
use View;
use Cart;
use DB;
use GuzzleHttp\Handler\Proxy;
use PhpParser\Node\Stmt\Catch_;

class IndexController extends Controller
{
    //
   
    public function __construct()
    {
        // $listcategory=Category::where('status',1)->get();
        // View::share('listcategory', $listcategory);
        // View::share('cartcount', $cartcount);
        
    }
 
    public function home(){

       
        
        $cartcount=  Cart::instance('shoppingcart')->count();

        $listproduct = Product::with('attributes')->where('status', 1)->orderBy('updated_at','desc')->limit(12)->get(); 
        $hotproduct = Product::where('status', 1)->where('hot',1)->orderBy('updated_at','desc')->get();
        
        return view('home',
        array(
            'listproduct'=>$listproduct,
            'hotproduct' => $hotproduct,
            'cartcount' => $cartcount
        ));
        
    }

    public function detail($slug,Request $request){


        
        $cartcount=  Cart::instance('shoppingcart')->count();
        $product = Product::where('slug', $slug)->first();
        
        $arrayhistory = $request->session()->get('history');
        
        $arrayhistory[$product->id] = Carbon::now('Asia/Ho_Chi_Minh');
        arsort( $arrayhistory);
        $request->session()->put('history',$arrayhistory);

        // session()->save();
        

        $list_style_attribute= [
            1 => "Color",
            2 => "Size"
        ];
       
        $listsize = (new Product())->listSize($product->id);
        $listcolor= (new Product())->listColor($product->id);
        $listproductrelated = Product::where('status',1)->orderby(DB::raw('RAND()'))->take(4)->get();
        $listproductrelatedown = Product::where('category_id',$product->category_id)->where('status',1)->orderby(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->take(4)->get();

        $history = $request->session()->get('history');
        
        
        $category =  Category::find($product->category_id);
        $brand = Brand::find($product->brand_id);
        return view('detail',
        array(
            'product'=>$product,
            'cartcount' => $cartcount,
            'listsize'=>$listsize,
            'listcolor'  => $listcolor,
            'category' =>  $category, 
            'brand'=>$brand,
            'listproductrelated'=>$listproductrelated,
            'history'=>$history,
            'listproductrelatedown'=>$listproductrelatedown,
        ));
    }
    public function search(Request $request){


        $filtertype = $request['filter_sort'];
        $cartcount=  Cart::instance('shoppingcart')->count();
        $data=$request->all();
        $search =  $request->get('keyword');

        $listproductrelated = Product::where('status',1)->orderby(DB::raw('RAND()'))->take(4)->get();

        $history = $request->session()->get('history');


        $listproduct_count = Product::where('status', 1)
        ->where('name', 'like', '%' . $search . '%')
        ->orwhere('code', 'like', '%' . $search . '%')
        ->orderBy('updated_at','desc')
        ->count();


        if(isset($filtertype)){

            
    
                if($filtertype == "price_desc") {
                    $column='price';
                    $type='desc';
                }
                if($filtertype == "price_asc") {
                    $column='price';
                    $type='asc';
                }
                if($filtertype == "sort_asc") {
                    $column='updated_at';
                    $type='asc';
                }
                if($filtertype == "sort_desc") {
                    $column='updated_at';
                    $type='desc';
                }
                if($filtertype == "id_asc"){
                    $column='id';
                    $type='asc';
                }
                if($filtertype == "id_desc"){
                    $column='id';
                    $type='desc';
                }
    

            

            $listproduct = Product::where('status', 1)
        ->where('name', 'like', '%' . $search . '%')
        ->orwhere('code', 'like', '%' . $search . '%')
        ->orderBy($column,$type)
        ->paginate(12);

       
        return view('products',
        array(
            'listproduct' => $listproduct,
            'listproduct_count'=>$listproduct_count,
            'cartcount' => $cartcount,
            'keyword'=>$search,
            'filter_sort'=>$filtertype,
            'listproductrelated'=>$listproductrelated,
            'history'=>$history,

        ));

        }else{
            $listproduct = Product::where('status', 1)
        ->where('name', 'like', '%' . $search . '%')
        ->orwhere('code', 'like', '%' . $search . '%')
        ->paginate(12);

        return view('products',
        array(
            'listproduct' => $listproduct,
            'listproduct_count'=>$listproduct_count,
            'cartcount' => $cartcount,
            'keyword'=>$search,
            'listproductrelated'=>$listproductrelated,
            'history'=>$history,

        ));

        }

       
    }


    public function cart(){
        $cartcount=  Cart::instance('shoppingcart')->count();
        
        $listcart = Cart::instance('shoppingcart')->content();
        $listproduct=[];
        foreach($listcart as $key=> $item){
            $product = Product::find($item->id); 
            $listproduct[$item->id] = $product;
        }
        

        return view('cart',
        
        array(
            'cartcount' => $cartcount,
            'listcart'=> $listcart,
            'listproduct'=> $listproduct 
        ));
    }

    public function wishlist(Request $request){

        if(!Auth::check()) return redirect('pagelogin');
        $cartcount=  Cart::instance('shoppingcart')->count();

        Cart::instance('wishlist')->destroy();

        $user = Auth::user();
        Cart::instance('wishlist')->restore($user->id);

        $wishlist = Cart::instance('wishlist')->content();
        $listproduct=[];
        foreach($wishlist as $key=> $item){
            $product = Product::find($item->id); 
            $listproduct[$item->id] = $product;
        }
        

        $listproductrelated = Product::where('status',1)->orderby(DB::raw('RAND()'))->take(4)->get();

        $history = $request->session()->get('history');
       

        return view('wishlist',
        
        array(
            'cartcount' => $cartcount,
            'wishlist'=> $wishlist,
            'listproduct'=>$listproduct,
            'listproductrelated'=>$listproductrelated,
            'history'=>$history,
 
        ));
    }

    public function category($slug,Request $request){
        
        
        $filtertype = $request['filter_sort'];


        $cartcount=  Cart::instance('shoppingcart')->count();
        $category = Category::where('slug', $slug)->first();

        $listchild =  (new Category())->getListChildren( $category->id);

        if(isset($filtertype)){
    
            if($filtertype == "price_desc") {
                $column='price';
                $type='desc';
            }
            if($filtertype == "price_asc") {
                $column='price';
                $type='asc';
            }
            if($filtertype == "sort_asc") {
                $column='updated_at';
                $type='asc';
            }
            if($filtertype == "sort_desc") {
                $column='updated_at';
                $type='desc';
            }
            if($filtertype == "id_asc"){
                $column='id';
                $type='asc';
            }
            if($filtertype == "id_desc"){
                $column='id';
                $type='desc';
            }

        $listproduct = Product::where('status',1)->orderby($column,$type)->where('category_id', $category->id)->orwhere(function ($listproduct) use ($listchild) {
            foreach ($listchild as $child) {
                $listproduct->orwhere('category_id',$child->id);
            }

        })->paginate(12);

        }else{
            $listproduct = Product::where('status',1)->where('category_id', $category->id)->orwhere(function ($listproduct) use ($listchild) {
                foreach ($listchild as $child) {
                    $listproduct->orwhere('category_id',$child->id);
                }
    
            })->paginate(12);
    

        }


        $listproduct_count = Product::where('status',1)->where('category_id', $category->id)->orwhere(function ($listproduct) use ($listchild) {
            foreach ($listchild as $child) {
                $listproduct->orwhere('category_id',$child->id);
            }

        })->count();
        $listrootcategory = Category::where('parent',0)->orderBy('id','desc')->get();
        $listbrand = Brand::orderBy('id','desc')->get();

        $listproductrelated = Product::where('status',1)->orderby(DB::raw('RAND()'))->take(4)->get();

        $history = $request->session()->get('history');
        // dd($listchild->toArray());


        if(isset($filtertype)){

            if(isset($listchild)){
                return view('category',
                array(
                    'cartcount' => $cartcount,
                    'listproduct'=> $listproduct,
                    'listrootcategory'=>$listrootcategory,
                    'listproduct_count'=>$listproduct_count,
                    'listbrand'=>$listbrand,
                    'category'=>$category,
                    'listchild'=>$listchild,
                    'filter_sort'=>$filtertype,
                    'listproductrelated'=>$listproductrelated,
            'history'=>$history,
                    
                   
                
                ));
            }else{
                return view('category',
                array(
                    'cartcount' => $cartcount,
                    'listproduct'=> $listproduct,
                    'listrootcategory'=>$listrootcategory,
                    'listproduct_count'=>$listproduct_count,
                    'listbrand'=>$listbrand,
                    'category'=>$category,
                    'filter_sort'=>$filtertype,
                    'listproductrelated'=>$listproductrelated,
            'history'=>$history,
                    
                
                ));
            }


        }else{


            if(isset($listchild)){
                return view('category',
                array(
                    'cartcount' => $cartcount,
                    'listproduct'=> $listproduct,
                    'listrootcategory'=>$listrootcategory,
                    'listproduct_count'=>$listproduct_count,
                    'listbrand'=>$listbrand,
                    'category'=>$category,
                    'listchild'=>$listchild,
                    'listproductrelated'=>$listproductrelated,
                    'history'=>$history,
                
                ));
            }else{
                return view('category',
                array(
                    'cartcount' => $cartcount,
                    'listproduct'=> $listproduct,
                    'listrootcategory'=>$listrootcategory,
                    'listproduct_count'=>$listproduct_count,
                    'listbrand'=>$listbrand,
                    'category'=>$category,
                    'listproductrelated'=>$listproductrelated,
            'history'=>$history,
                    
                
                ));
            }


        }
            



        
    }
    public function pagecategory(Request $request){

        $filtertype = $request['filter_sort'];


        if(isset($filtertype)){
    
            if($filtertype == "price_desc") {
                $column='price';
                $type='desc';
            }
            if($filtertype == "price_asc") {
                $column='price';
                $type='asc';
            }
            if($filtertype == "sort_asc") {
                $column='updated_at';
                $type='asc';
            }
            if($filtertype == "sort_desc") {
                $column='updated_at';
                $type='desc';
            }
            if($filtertype == "id_asc"){
                $column='id';
                $type='asc';
            }
            if($filtertype == "id_desc"){
                $column='id';
                $type='desc';
            }
            $listproduct = Product::where('status',1)->orderBy($column,$type)->paginate(12);
        
        }else{
            $listproduct = Product::where('status',1)->orderBy('updated_at','desc')->paginate(12);
        }

        $cartcount =  Cart::instance('shoppingcart')->count();
        $listrootcategory = Category::where('parent',0)->orderBy('id','desc')->get();
       
        $listproduct_count= Product::where('status',1)->orderBy('updated_at','desc')->count();
        $listbrand = Brand::orderBy('id','desc')->get();

        $listproductrelated = Product::where('status',1)->orderby(DB::raw('RAND()'))->take(4)->get();

        $history = $request->session()->get('history');


        if(isset($filtertype)){
            return view('category',
        array(
            'cartcount' => $cartcount,
            'listproduct'=> $listproduct ,
            'listrootcategory'=>$listrootcategory,
            'listproduct_count'=>$listproduct_count,
            'listbrand'=>$listbrand,
            'filter_sort'=>$filtertype,
            'listproductrelated'=>$listproductrelated,
            'history'=>$history,
        ));
            
        }else{
            return view('category',
        array(
            'cartcount' => $cartcount,
            'listproduct'=> $listproduct ,
            'listrootcategory'=>$listrootcategory,
            'listproduct_count'=>$listproduct_count,
            'listbrand'=>$listbrand,
            'listproductrelated'=>$listproductrelated,
            'history'=>$history,
            
        ));

        }

        
    }
    
    public function login(){
        $cartcount=  Cart::instance('shoppingcart')->count();
        return view('login',
        array(
            'cartcount' => $cartcount,
           
        ));
        
    }

    public function register(){
        $cartcount=  Cart::instance('shoppingcart')->count();
        return view('register',
        array(
            'cartcount' => $cartcount,
           
        ));
        
    }

    public function checkout(){
        $cartcount=  Cart::instance('shoppingcart')->count();
        $listcart = Cart::instance('shoppingcart')->content();
        $listproduct=[];

        $listquantity=[];
        foreach($listcart as $key=> $item){
            $product = Product::find($item->id); 
            if(isset($listquantity[$product->id] )){
                $listquantity[$product->id] += $item->qty;
            }else{
                $listquantity[$product->id] = $item->qty;
            }

            if($listquantity[$product->id] > $product->quantity ){
                $message = 'product name'. $product->name.'is exceeding the remaining quantity';
                return redirect()->back()->with('type','error')->with('message',$message);
            }
            
           
            $listproduct[$item->id] = $product;
        }

        if($cartcount == 0 ){
            $message = 'Your Cart is empty';
                return redirect()->back()->with('type','error')->with('message',$message);
        }

        

        return view('checkout', array(
            'cartcount' => $cartcount,
            'listcart'=> $listcart,
            'listproduct'=> $listproduct 
        ));

    }

    public function userinfo(){
        
        $cartcount=  Cart::instance('shoppingcart')->count();

        if(Auth::check()){
            $user = Auth::user();

            return view('changeinfo', array(
                'cartcount' => $cartcount,
                
            ));

        }else{
            $message='You are not logged in';
            return redirect()->back()->with('type','error')->with('message',$message);
        }
       
    }

    public function updateinfo(Request $request){

        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'phone' => 'required|min:8',
            'address' => 'required',

        ]);
        $cartcount=  Cart::instance('shoppingcart')->count();

        $first_name = $request->get('first_name');
        $last_name=  $request->get('last_name');
        $address =  $request->get('address');
        $phone_number = $request->get('phone');

        $user = User::find(Auth::user()->id);
        $user->first_name = $first_name;
        $user->last_name = $last_name;
        $user->address = $address;
        $user->phone_number= $phone_number;
        
        if($user->save()){
            $message='Change user information successfully';
            return redirect()->back()->with('type','success')->with('message',$message);
        }else{
            $message='Change user information fail';
            return redirect()->back()->with('type','error')->with('message',$message);
        }
        
      

    }




    public function admin(Request $request){
        return view('admin.layout');

    }

    public function newsdetail(){
        

    }
    public function listnewscategory(){

    }

    public function newscategory(){
        
    }
    

    
    




    

} 
