<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductOrder extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_product',
        'id_order'	,
        'quntityP'
    ];

    public function order(){
        return $this->belongsTo(Order::class,'id_order' ,'id') ;
    }

    public function product(){
        return $this->belongsTo(Product::class,'id_product' ,'id') ;
    }


    

}
