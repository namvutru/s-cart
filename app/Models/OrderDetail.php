<?php

namespace App\Models;

use Doctrine\DBAL\Schema\ForeignKeyConstraint;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table='table_order_detail'; 
    public $timestamps = false; 
    use HasFactory;

    public function listItems($id){
        $listItems = OrderDetail::where('order_id', $id)->get();
        return $listItems;
    }

    
}
