<?php

namespace App\Models;

use App\Models\Admin;
use App\Models\Order;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $fillable =[
        'name',
        'phone',
        'userName',
        'password',
        'id_admin'
    ];

    public function orders(){
        return $this->hasMany(Order::class,'id_employee' ,'id') ;
    }

    public function admin(){
        return $this->belongsTo(Admin::class,'id_admin' ,'id') ;
    }
}
