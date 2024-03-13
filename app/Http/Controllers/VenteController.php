<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class VenteController extends Controller
{

    public function index()
    {
        $admin = Auth::user();

        $orders = DB::table('orders')
        ->join('clients', 'clients.id', '=', 'orders.id_client')
        ->select('orders.id as id','orders.supplier as nameSupplier','clients.name as nameClient','orders.totale as totale', 'orders.created_at as dateOrder' )
        ->latest('orders.created_at')->get();

        $orders_profite = DB::table('product_orders')
        ->join('products', 'products.id', '=', 'product_orders.id_product')
        ->join('orders', 'orders.id', '=', 'product_orders.id_order')
        ->join('clients', 'clients.id', '=', 'orders.id_client')
        ->select('orders.id as id', 
                DB::raw('SUM(products.pricePurchase * product_orders.quntityP) AS totalePur')
                )
        ->groupBy('orders.id')
        ->orderByDesc('orders.created_at')
        ->get();


        $dateOredrs = DB::table('orders')
        ->join('clients', 'clients.id', '=', 'orders.id_client')
        ->select(DB::raw('YEAR(orders.created_at) as yearOrder') )
        ->latest('orders.created_at')->get();
        
        return view('vente.index',compact('admin','orders','orders_profite','dateOredrs'));

    }




    public function show($id)
    {
        //
    }


}
