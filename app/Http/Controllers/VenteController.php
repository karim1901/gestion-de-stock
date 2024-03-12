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
        ->join('employees', 'employees.id', '=', 'orders.id_employee')
        ->join('clients', 'clients.id', '=', 'orders.id_client')
        ->select('employees.name as nameEmp','clients.name as nameClient','orders.totale as totale', 'orders.created_at as dateOrder' )
        ->latest('orders.created_at')->get();

        
        return view('vente.index',compact('admin','orders'));

    }




    public function show($id)
    {
        //
    }


}
