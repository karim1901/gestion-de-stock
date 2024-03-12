<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use App\Models\Depot;
use App\Models\Product;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

    public function index()
    {
        $admin = Auth::user();

        $products = DB::table('achats')
        ->join('products', 'products.id', '=', 'achats.id_product')
        ->join('fournisseurs', 'fournisseurs.id', '=', 'achats.id_fournisseur')
        ->join('depots', 'depots.id', '=', 'achats.id_depot')
        ->select('products.*', 'fournisseurs.name as nameFour', 'depots.name as nameDepot' )
        ->latest()->get();
    
        return view('product.index' ,compact('admin','products'));
    }


    public function create()
    {

        $fournisseurs = Fournisseur::all();
        $depots = Depot::all();
        $admin = Auth::user();
        return view('product.create' ,compact('admin','fournisseurs','depots'));
    }


    public function store(Request $request)
    {



        $request->validate([
            'title'=>'required',
            'quantity'=>'required|numeric',
            'pricePurchase'=>'required|numeric',
            'price'=>'required|numeric',
        ]);



        $id_admin = Auth::user()->id;

        Product::create([
            'title'=>$request->title,
            'quantity'=>$request->quantity,
            'pricePurchase'=>$request->pricePurchase,
            'price'=>$request->price,
            'id_admin'=>$id_admin
        ]);

        $products = Product::latest()->get();


        Achat::create([
            'id_product'=>$products[0]->id,
            'id_fournisseur'=>$request->fournisseur,
            'id_depot'=>$request->depot
        ]);

        return redirect()->route('product.index');
    }

    public function show(Product $product)
    {
        return view('product.show');
    }


    public function edit(Product $product)
    {
        return view('product.edit');
    }


    public function update(Request $request, Product $product)
    {
        return redirect()->route('product.index');
    }

  
    public function destroy(Product $product)
    {
        return redirect()->route('product.index');
    }
}
