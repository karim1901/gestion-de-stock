<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Client;
use App\Models\Product;
use App\Models\Employee;
use App\Models\ProductOrder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable=[
        'totale',
        'supplier',
        'id_client',
        'id_admin'
    ];

    public function products(){
        return $this->hasMany(ProductOrder::class , 'id_order','id');
    }

    public function admin(){
        return $this->belongsTo(Admin::class,'id_admin' ,'id') ;
    }

    public function employees(){
        return $this->belongsTo(Employee::class,'id_employee' ,'id') ;
    }

    public function clients(){
        return $this->belongsTo(Client::class,'id_client' ,'id') ;
    }

}
