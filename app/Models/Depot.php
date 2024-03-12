<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Fournisseur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Depot extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'adress',
        'id_product',
        'id_fournisseur'
    ];


}
