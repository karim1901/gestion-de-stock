@extends('layout')

@section('title','Les Produits')

@section('content')



<div class="form">
    <form action="{{route('product.store')}}" method="post">
        @csrf
        <h2>Ajouter Produit</h2>
        <div class="inputs">
            <div class="title">
                <input type="text" name="title" placeholder="Titre">
                @error('title')
                    <small>{{$message}}</small>
                @enderror
            </div>

            <div class="quantity">
                <input type="text" name="quantity" placeholder="Quantiee">
                @error('quantity')
                    <small>{{$message}}</small>
                @enderror
            </div>

        </div>
        <div class="inputs">
            <div class="pricePurchase">
                <input type="text" name="pricePurchase" placeholder="Prix Achat">
                @error('quantity')
                    <small>{{$message}}</small>
                @enderror
            </div>
            <div class="price">
                <input type="text" name="price" placeholder="Prix">
                @error('quantity')
                    <small>{{$message}}</small>
                @enderror
            </div>
        </div>


        <div class="fournisseur">
            <p>Choisir Fournisseur</p>
            <select name="fournisseur" id="">
                @foreach ($fournisseurs as $fournisseur)
                    <option  value={{$fournisseur->id}}>{{$fournisseur->name}}</option>
                @endforeach
            </select>
            <a href="{{route('fournisseur.create')}}"><button type="button">Ajouter Fournisseur</button></a>
        </div>

        <div class="repo" >
            <p>Choisir Depot</p>
            <select name="depot" id="" >
                @foreach ($depots as $depot)
                    <option  value={{$depot->id}}>{{$depot->name}}</option>
                @endforeach
            </select>
            <a href="{{route('depot.create')}}"><button type="button">Ajouter depot</button></a>
        </div>

        <button>Ajouter</button>


    </form>
</div>




    
@endsection