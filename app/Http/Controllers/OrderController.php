<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderTem;
use App\Models\ProductOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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

        $orderTems = DB::table('order_tems')
        ->join('products', 'products.id', '=', 'order_tems.id_product')
        ->select('products.id as id','products.title as title', 'products.price as price', 'order_tems.quntityP as quantity')
        ->latest('order_tems.created_at')
        ->get();

        $totale= 0;

        foreach($orderTems as $orderTem){
            $totale = $totale + $orderTem->price*$orderTem->quantity;
        }


        // dd($request->all());

        if($totale > 0){
            Order::create([
                'totale'=>$totale,
                'id_employee'=>Auth::user()->id,
                'id_client'=>$request->client,
                'id_admin'=>1
            ]);
        }


        $orders = Order::latest()->get();


        foreach($orderTems as $orderTem){
            ProductOrder::create([
                'id_product'=>$orderTem->id,
                'id_order'=>$orders[0]->id	,
                'quntityP'=>$orderTem->quantity
            ]);
        }

        OrderTem::truncate();


        return back();

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
