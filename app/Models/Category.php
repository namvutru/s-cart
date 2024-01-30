<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model

{
    protected $table='table_category';
    use HasFactory;

    
    public function listCate(){
        $list   = [];
        $result = $this->select('name', 'id')
            ->get()
            ->toArray();
        foreach ($result as $value) {
            $list[$value['id']] = $value['name'];
        }
        return $list;
    }

    public function checkroot($id){
        $category =  $this->find($id);
        if($category->parent == 0||$category->parent == null) return true;
        else return false;
    }

    public function getChildren($id){
        $list   = [];
        $listchidren = Category::where('parent',$id)->orderBy('id','desc')->get()->toArray();
        foreach ($listchidren as $value) {
            $list[$value['id']] = '--'.$value['name'];
        }
        return $list;
    }


    public function getListChildren($id){
        
        $listchidren = Category::where('parent',$id)->orderBy('id','desc')->get();
       
        return $listchidren;
    }

   
    
    

    public function listCateTwoLever(){
        $list   = [];
        $result = $this->select('name', 'id')
            ->get()
            ->toArray();
        foreach ($result as $value) {
            if( $this->checkroot($value['id'])){
                $list[$value['id']] = $value['name'];
                $listchildren = $this->getChildren($value['id']);
                $list =$list + $listchildren;
            }  
        }
        return $list;
    }

    public function listCateTwoLeverApi(){
        $list  = [];
        $listcate = $this->listCateTwoLever();
        foreach($listcate as $key => $cate){
            array_push($list, ['text' => $cate, 'value' => $key]);
        }
        return $list;
    }
}
