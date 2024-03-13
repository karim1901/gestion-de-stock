<?php

namespace App\Models;

use App\Models\Order;
use App\Models\Product;
use App\Models\Employee;
use App\Models\Fournisseur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;
    protected $fillable =[
        'name' ,
        'phone',
        'userName',
        'password',
        'role',
        'code'
    ];

    public function employees(){
        return $this->hasMany(Employee::class,'id_admin' ,'id') ;
    }

    public function fournisseurs(){
        return $this->hasMany(Fournisseur::class,'id_admin' ,'id') ;
    }

    public function products(){
        return $this->hasMany(Product::class,'id_admin' ,'id') ;
    }

    public function orders(){
        return $this->hasMany(Order::class,'id_admin' ,'id') ;
    }
}
