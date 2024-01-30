<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    public $timestamps = false;
    protected $fillable =['name_attribute','style_attribute','price'];
    protected $table='table_attribute';
    use HasFactory;
}
