<?php

namespace App\Models;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Client extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'phone',
        'city',
        'adress'
    ];

    public function orders(){
        return $this->hasMany(Client::class , 'id_order','id') ;
    }
}
