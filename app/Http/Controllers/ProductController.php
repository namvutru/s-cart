<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listproduct = DB::table('table_product')
        ->join('table_category', 'table_category.id', '=', 'table_product.category_id')->join('table_brands','table_brands.id','=','table_product.brand_id')
        ->select('table_product.*','table_category.name as category_name','table_brands.name as brand_name')->get();
        // $listproduct =Product::all();
        foreach($listproduct as $product){
            $product->image = env("APP_URL").'/documents/website/'.$product->image;
        }

           

        return response()->json(
            [
                
                'error'=> 0,
                'listproduct'=> $listproduct->toArray(),
            ]
        );

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProductRequest $request)
    {
        //
        $product = new Product();

        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->quantity = $request->get('quantity');
        $product->code = $request->get('code');
        $product->description = $request->get('description');
        $product->hot = $request->get('hot');
        $product->status = $request->get('status');
        $product->category_id = $request->get('category_id');
        $product->brand_id = $request->get('brand_id');
        $product->slug = $request->get('slug');
        $product->old_price = $request->get('old_price');

        if($request->hasFile('image')){
            $image = $request->file('image');
            $newFileName = time() . '_' . $image->getClientOriginalName();
            $filename = $image->storeAs('product', $newFileName, 'public');
        
        }else{
            $filename="";
        }

        $product->image= $filename;

        if($product->save()){
            return response()->json([
                'data' => $product->toArray(),          
                'message' =>'Stored product successfully',
                'status' => 200,
            ]);
        }else{
            return response()->json([
                'message' =>'Store product failed',
                'status' => 401,
            ]);

        }
        

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if($product->image!=""){
            $product->image = env("APP_URL").'/documents/website/'.$product->image;
        }
        if($product){
            return response()->json([
                'data' => $product->toArray(),          
                'status' => 200,
            ]);
        }else{
            return response()->json([
                'message' => "This product not found",          
                'status' => 400,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if($product){
            return response()->json([
                'data' => $product->toArray(),          
                'status' => 200,
            ]);
        }else{
            return response()->json([
                'message' => "This product not found",          
                'status' => 400,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);
        if(!$product){
            return response()->json([
                'message' =>'This Product not found',
                'status' => 401,
            ]);
        }

        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->quantity = $request->get('quantity');
        $product->code = $request->get('code');
        $product->description = $request->get('description');
        $product->hot = $request->get('hot');
        $product->status = $request->get('status');
        $product->category_id = $request->get('category_id');
        $product->brand_id = $request->get('brand_id');
        $product->slug = $request->get('slug');
        $product->old_price = $request->get('old_price');


        if($request->get('image') == env("APP_URL").'/documents/website/'.$product->image){
            
        }else{
            $fileimage = public_path('/documents/website/'.$product->image);
            if(File::exists($fileimage)){
                File::delete($fileimage);  
            }

           
        if($request->hasFile('image')){
            $image = $request->file('image');
            $newFileName = time() . '_' . $image->getClientOriginalName();
            $filename = $image->storeAs('product', $newFileName, 'public');
        
        }else{
            $filename="";
        }

        $product->image= $filename;
        }
        if($product->save()){
            return response()->json([
                'data' => $product->toArray(),          
                'message' =>'Update product successfully',
                'status' => 200,
            ]);
        }else{
            return response()->json([
                'message' =>'Update product failed',
                'status' => 401,
            ]);

            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product ){
            if($product->delete()){
                return response()->json([
                    'message' => "Delete this product successfully",          
                    'status' => 200,
                ]);
            }else{
                return response()->json([
                    'message' => "Delete this product fail",          
                    'status' => 400,
                ]);
                
            }
        }else{
            return response()->json([
                'message' => "This product not found",          
                'status' => 400,
            ]);
        }
    }
}
