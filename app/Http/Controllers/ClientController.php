<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clients = Client::latest()->get();
        $admin = Auth::user();
        return view('client.index',compact('admin','clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $admin = Auth::user();
        return view('client.create',compact('admin'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'adress'=>'required',
            'city'=>'required',
        ]);


        Client::create($request->all());

        return redirect()->route('client.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Client $client)
    {
        $admin = Auth::user();
        return view('client.edit',compact('admin','client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'adress'=>'required',
            'city'=>'required',
        ]);


        $client->update($request->all());

        return redirect()->route('client.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        $client->delete();
        return redirect()->route('client.index');
    }
}
