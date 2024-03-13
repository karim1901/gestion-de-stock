<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashbordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $products = DB::table('achats')
        ->join('products', 'products.id', '=', 'achats.id_product')
        ->join('fournisseurs', 'fournisseurs.id', '=', 'achats.id_fournisseur')
        ->join('depots', 'depots.id', '=', 'achats.id_depot')
        ->select('products.*', 'fournisseurs.name as nameFour', 'depots.name as nameDepot' )
        ->latest()->get();

        $clients = Client::all();


        $orderTems = DB::table('order_tems')
        ->join('products', 'products.id', '=', 'order_tems.id_product')
        ->select('products.title as title', 'products.price as price', 'order_tems.quntityP as quantity', 'order_tems.id as id')
        ->latest('order_tems.created_at')
        ->get();
    
        // dd($orderTems);

        $admin = Auth::user();
        return view('dashbord.index',compact('admin','products','clients','orderTems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
