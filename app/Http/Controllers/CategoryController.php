<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listcategory =  Category::all();
        foreach($listcategory as $category){
            $category->image = env("APP_URL").'/documents/website/'.$category->image;
            $parent  = Category::find($category->parent);
            if($parent){
                $category->parent = $parent->name;
            }else{
                $category->parent = "";
            }

           
        }
       
        return response()->json(
            [
                
                'status'=>200,
                'listcategory'=> $listcategory->toArray(),
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
        $listcategory = (new Category())->listCateTwoLeverApi();
       
        
        return response()->json([
            
            'listcategory' => $listcategory,

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCategoryRequest $request)
    {
        
        $category =  new Category();

        $category->name = $request->get('name');
        $category->name_en = $request->get('name_en');
        $category->parent = $request->get('parent');
        $category->slug = $request->get('slug');
        $category->status = $request->get('status');
        
        if($request->hasFile('image')){
            $image = $request->file('image');
            $newFileName = time() . '_' . $image->getClientOriginalName();
            $filename = $image->storeAs('category', $newFileName, 'public');
        
        }else{
            $filename="";
        }

        $category->image= $filename;

        if($category->save()){
            return response()->json([
                'data' => $category->toArray(),          
                'message' =>'Stored category successfully',
                'status' => 200,
            ]);
        }else{
            return response()->json([
                'message' =>'Store category failed',
                'status' => 401,
            ]);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        if($category->image!=""){
            $category->image = env("APP_URL").'/documents/website/'.$category->image;
        }
        if($category){
            return response()->json([
                'data' => $category->toArray(),          
                'status' => 200,
            ]);
        }else{
            return response()->json([
                'message' => "This category not found",          
                'status' => 400,
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $category = Category::find($id);
        if($category){
            return response()->json([
                'data' => $category->toArray(),          
                'status' => 200,
            ]);
        }else{
            return response()->json([
                'message' => "This category not found",          
                'status' => 400,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $category =  Category::find($id);
        $category->name = $request->get('name');
        $category->name_en = $request->get('name_en');
        $category->parent = $request->get('parent');
        $category->slug = $request->get('slug');
        $category->status = $request->get('status');
        
        if($request->get('image') == env("APP_URL").'/documents/website/'.$category->image){
            
        }else{
            $fileimage = public_path('/documents/website/'.$category->image);
            if(File::exists($fileimage)){
                File::delete($fileimage);  
            }

            if($request->hasFile('image')){
                $image = $request->file('image');
                $newFileName = time() . '_' . $image->getClientOriginalName();
                $filename = $image->storeAs('category', $newFileName, 'public');
            }else{
                $filename="";
            }
            $category->image= $filename;
        }

        if($category->save()){
            return response()->json([
                'data' => $category->toArray(),          
                'message' =>'Updated category successfully',
                'status' => 200,
            ]);
        }else{
            return response()->json([
                'message' =>'Update category failed',
                'status' => 401,
            ]);

        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $category = Category::find($id);
        if($category){
            if($category->delete()){
                return response()->json([
                    'message' => "Delete this category successfully",          
                    'status' => 200,
                ]);
            }else{
                return response()->json([
                    'message' => "Delete this category fail",          
                    'status' => 400,
                ]);
                
            }
        }else{
            return response()->json([
                'message' => "This category not found",          
                'status' => 400,
            ]);
        }
    }
}
