<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    use HasFactory;

    protected $fillable = ['id_product' , 'id_fournisseur','id_depot'];


    public function products(){
        return $this->hasMany(achat::class,'id_product' ,'id') ;
    }

    public function fournisseurs(){
        return $this->hasMany(achat::class,'id_fournisseur' ,'id') ;
    }

    public function depots(){
        return $this->hasMany(achat::class,'id_depot' ,'id') ;
    }

    public function achat(){
        return $this->belongsTo(Achat::class,'id_product' ,'id') ;
    }
}
