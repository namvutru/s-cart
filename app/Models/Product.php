<?php

namespace App\Models;

use GuzzleHttp\Handler\Proxy;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;

class Product extends Model
{
    protected $table='table_product';
    use HasFactory;

    public function attributes()
    {
        return $this->hasMany('App\Models\Attribute', 'product_id', 'id');
    }
    
    public function brand()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function checkattribute($id){
        $attribute = Attribute::where('product_id', $id)->count();
        if($attribute > 0) return true;
        else return false;
    }
    

    public function listSize($id){
        $list_style_attribute= [
            1 => "Color",
            2 => "Size"
        ];
     
        $attribute = Attribute::where('product_id', $id)->where('style_attribute', 2)->get();
        if($attribute) return $attribute;
        else return null;
    }

    public function listColor($id){
        $list_style_attribute= [
            1 => "Color",
            2 => "Size"
        ];
     
        $attribute = Attribute::where('product_id', $id)->where('style_attribute', 1)->get();
        if($attribute) return $attribute;
        else return null;

    }

    public function quantitybuy($id){
        $listorderdetail = OrderDetail::where('product_id', $id)->get();
        $count = 0;
        foreach ($listorderdetail as $orderdetail){
            $count+= $orderdetail->qty;
        }
        return $count;
    }

    public function getproduct($id){
        $product=  $this-> find($id);
        return $product;
    }

    


}
