<?php

namespace App\Http\Controllers;

use App\Models\Fournisseur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FournisseurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fournisseurs = Fournisseur::latest()->get();
        $admin = Auth::user();
        return view('fournisseur.index',compact('admin','fournisseurs'));
    }

    public function create()
    {
        $admin = Auth::user();
        return view('fournisseur.create',compact('admin'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'adress'=>'required',
            'email'=>'required',
        ]);


        Fournisseur::create([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'adress'=>$request->adress,
            'email'=>$request->email,
            'id_admin'=> Auth::user()->id,
        ]);

        return redirect()->route('fournisseur.index');

    }

    public function edit(Fournisseur $fournisseur)
    {
        $admin = Auth::user();
        return view('fournisseur.edit',compact('admin','fournisseur'));
    }

    public function update(Request $request, Fournisseur $fournisseur)
    {
        $request->validate([
            'name'=>'required',
            'phone'=>'required',
            'adress'=>'required',
            'email'=>'required',
        ]);


        $fournisseur->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'adress'=>$request->adress,
            'email'=>$request->email,
            'id_admin'=> Auth::user()->id,
        ]);

        return redirect()->route('fournisseur.index');
    }

    public function destroy(Fournisseur $fournisseur)
    {
        $fournisseur->delete();
        return redirect()->route('fournisseur.index');

    }
}
