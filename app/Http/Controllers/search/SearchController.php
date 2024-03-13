<?php

namespace App\Http\Controllers\search;

use App\Models\Depot;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    
    public function searchProduct(Request $request){
        // dd($request->all());


        $admin = Auth::user();

        $searchQuery = $request->search; 

        $products = DB::table('achats')
        ->join('products', 'products.id', '=', 'achats.id_product')
        ->join('fournisseurs', 'fournisseurs.id', '=', 'achats.id_fournisseur')
        ->join('depots', 'depots.id', '=', 'achats.id_depot')
        ->select('products.*', 'fournisseurs.name as nameFour', 'depots.name as nameDepot')
        ->where(DB::raw('LOWER(products.title)'), 'like', '%' . strtolower($searchQuery) . '%')
        ->latest()
        ->get();
        
        return view('product.index' ,compact('admin','products'));
        
    }

    public function searchDashbord(Request $request){
        // dd($request->all());


        $admin = Auth::user();

        $searchQuery = $request->search; 

        $products = DB::table('achats')
        ->join('products', 'products.id', '=', 'achats.id_product')
        ->join('fournisseurs', 'fournisseurs.id', '=', 'achats.id_fournisseur')
        ->join('depots', 'depots.id', '=', 'achats.id_depot')
        ->select('products.*', 'fournisseurs.name as nameFour', 'depots.name as nameDepot')
        ->where(DB::raw('LOWER(products.title)'), 'like', '%' . strtolower($searchQuery) . '%')
        ->latest()
        ->get();
        
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


    public function searchClient(Request $request){
        $admin = Auth::user();

        $clients = Client::where(DB::raw('LOWER(name)'), 'LIKE', '%' . strtolower($request->search) . '%')->get();

        return view('client.index' ,compact('admin','clients'));

    }
    
    public function searchEmployee(Request $request){
        $admin = Auth::user();

        $emps = Employee::where(DB::raw('LOWER(name)'), 'LIKE', '%' . strtolower($request->search) . '%')->get();

        return view('employee.index' ,compact('admin','emps'));

    }

    public function searchDepot(Request $request){
        $admin = Auth::user();

        $depots = Depot::where(DB::raw('LOWER(name)'), 'LIKE', '%' . strtolower($request->search) . '%')->get();

        return view('depot.index' ,compact('admin','depots'));

    }


    public function searchFournisseur(Request $request){
        $admin = Auth::user();

        $fournisseurs = Fournisseur::where(DB::raw('LOWER(name)'), 'LIKE', '%' . strtolower($request->search) . '%')->get();

        return view('fournisseur.index' ,compact('admin','fournisseurs'));

    }
    

    // public function searchVente(Request $request){
    //     $admin = Auth::user();


    //     if($request->day == null){
    //         $request['day'] = '00';
    //     }

    //     dd($request->all());

    //     $orders = DB::table('orders')
    //     ->join('clients', 'clients.id', '=', 'orders.id_client')
    //     ->select('orders.supplier as nameSupplier','clients.name as nameClient','orders.totale as totale', 'orders.created_at as dateOrder',DB::raw('YEAR(orders.created_at) as yearOrder') )
    //     ->latest('orders.created_at')->get();

        
    //     return view('vente.index',compact('admin','orders'));

    // }


    public function searchVente(Request $request){
        $admin = Auth::user();
    
        // Default to '00' if day is not provided
        $day = $request->day ?? '00';

        if($request->day == null && $request->month == null && $request->year == null){
            return redirect()->route('vente.index');
        }elseif($request->day == null && $request->month == null && $request->year != null ){
            $orders = DB::table('orders')
            ->join('clients', 'clients.id', '=', 'orders.id_client')
            ->whereYear('orders.created_at', $request->year)
            ->select('orders.id as id','orders.supplier as nameSupplier', 'clients.name as nameClient', 'orders.totale as totale', 'orders.created_at as dateOrder', DB::raw('YEAR(orders.created_at) as yearOrder'))
            ->get();
        }elseif($request->day == null && $request->month != null && $request->year == null ){
            $orders = DB::table('orders')
            ->join('clients', 'clients.id', '=', 'orders.id_client')
            ->whereMonth('orders.created_at', $request->month)
            ->select('orders.id as id','orders.supplier as nameSupplier', 'clients.name as nameClient', 'orders.totale as totale', 'orders.created_at as dateOrder')
            ->get();
        }elseif($request->day != null && $request->month == null && $request->year == null ){
            $orders = DB::table('orders')
            ->join('clients', 'clients.id', '=', 'orders.id_client')
            ->whereDay('orders.created_at', $request->day)
            ->select('orders.id as id','orders.supplier as nameSupplier', 'clients.name as nameClient', 'orders.totale as totale', 'orders.created_at as dateOrder')
            ->get();
        }
        elseif($request->day != null && $request->month != null && $request->year != null ){
            $orders = DB::table('orders')
            ->join('clients', 'clients.id', '=', 'orders.id_client')
            ->whereYear('orders.created_at', $request->year)
            ->whereMonth('orders.created_at', $request->month)
            ->whereDay('orders.created_at', $request->day)
            ->select('orders.id as id','orders.supplier as nameSupplier', 'clients.name as nameClient', 'orders.totale as totale', 'orders.created_at as dateOrder')
            ->get();
        }elseif($request->day == null && $request->month != null && $request->year != null ){
            $orders = DB::table('orders')
            ->join('clients', 'clients.id', '=', 'orders.id_client')
            ->whereYear('orders.created_at', $request->year)
            ->whereMonth('orders.created_at', $request->month)
            ->select('orders.id as id','orders.supplier as nameSupplier', 'clients.name as nameClient', 'orders.totale as totale', 'orders.created_at as dateOrder')
            ->get();
        }elseif($request->day != null && $request->month == null && $request->year != null ){
            $orders = DB::table('orders')
            ->join('clients', 'clients.id', '=', 'orders.id_client')
            ->whereYear('orders.created_at', $request->year)
            ->whereDay('orders.created_at', $request->day)
            ->select('orders.id as id','orders.supplier as nameSupplier', 'clients.name as nameClient', 'orders.totale as totale', 'orders.created_at as dateOrder')
            ->get();
        }elseif($request->day != null && $request->month != null && $request->year == null ){
            $orders = DB::table('orders')
            ->join('clients', 'clients.id', '=', 'orders.id_client')
            ->whereMonth('orders.created_at', $request->month)
            ->whereDay('orders.created_at', $request->day)
            ->select('orders.id as id','orders.supplier as nameSupplier', 'clients.name as nameClient', 'orders.totale as totale', 'orders.created_at as dateOrder')
            ->get();
        }
    
    


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
        // dd($orders);

        return view('vente.index',compact('admin','orders','orders_profite','dateOredrs'));

    }
    

}
