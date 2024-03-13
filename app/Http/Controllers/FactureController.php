<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Facture; // Assurez-vous d'importer le modèle Facture s'il existe

class FactureController extends Controller
{
    public function showFacture(string $id){


        $order = DB::table('product_orders')
        ->join('products','products.id','=','product_orders.id_product')
        ->join('orders','orders.id','=','product_orders.id_order')
        ->join('clients','clients.id','=','orders.id_client')
        ->select('products.title as title' ,
        'products.price as price',
        'orders.totale as totale',
        'orders.supplier as supplier' ,
        'product_orders.quntityP as quantity',
        'orders.created_at as date' ,
        'clients.name as nameClient',
        'clients.phone as phoneClient',
        'clients.adress as adressClient',
        'clients.city as cityClient',
        )
        ->where('orders.id', $id)
        ->get();

        // dd($order);

        return view('facture.index',compact('order'));
    }
}