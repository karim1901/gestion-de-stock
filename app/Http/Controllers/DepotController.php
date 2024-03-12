<?php

namespace App\Http\Controllers;

use App\Models\Depot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepotController extends Controller
{

    public function index()
    {
        $depots = Depot::latest()->get();
        $admin = Auth::user();
        return view('depot.index',compact('admin','depots'));
    }


    public function create()
    {
        $admin = Auth::user();
        return view('depot.create',compact('admin'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'adress'=>'required',
        ]);
        
        Depot::create($request->all());

        return redirect()->route('depot.index');

    }


    public function show(Depot $depot)
    {
        //
    }


    public function edit(Depot $depot)
    {
        $admin = Auth::user();
        return view('depot.edit',compact('admin','depot'));
    }


    public function update(Request $request, Depot $depot)
    {
        //
    }


    public function destroy(Depot $depot)
    {
        //
    }
}
