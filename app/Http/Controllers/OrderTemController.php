<?php

namespace App\Http\Controllers;

use App\Models\OrderTem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderTemController extends Controller
{
    
    public function store(Request $request)
    {
        $request->validate([
            'quantity'=>'required|numeric|gt:0',
            // 'id' => 'required|exists:order_tems,id'
        ]);

        // dd($request->all());

        $product = OrderTem::where(DB::raw('id_product'), 'LIKE', '%' .$request->id. '%')->get();;


        // dd($product->all());


        if($product->all() != []){
            $orderTem = OrderTem::find($product[0]->id);
            $orderTem->update([
                'id_product'=>$request->id,
                'quntityP'=>$product[0]->quntityP+$request->quantity
            ]);
        }else{
            OrderTem::create([
                'id_product'=>$request->id,
                'quntityP'=>$request->quantity
            ]);    
        }


        return redirect()->route('dashbord.index');
    }



    public function destroy(string $id)
    {
        $orderTem = OrderTem::find($id);

        if (!$orderTem) {
            abort(404); 
        }

        $orderTem->delete();
        

        return redirect()->route('dashbord.index');
        
    }
}
