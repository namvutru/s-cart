<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table='table_brands';
    use HasFactory;

    public $timestamps = false;
    public function listBrand(){
        $list   = [];
        $result = $this->select('name', 'id')
            ->get()
            ->toArray();
        foreach ($result as $value) {
            $list[$value['id']] = $value['name'];
        }
        return $list;
    }
    public function listBrandApi(){
        $list  = [];
        $listbrand = $this->listBrand();
        foreach($listbrand as $key => $brand){
            array_push($list, ['text' => $brand, 'value' => $key]);
        }
        return $list;
    }
}
