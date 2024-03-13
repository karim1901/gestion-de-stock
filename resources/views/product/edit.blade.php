@extends('layout')

@section('title','Les Produits')

@section('content')

<div class="form">
    <form action="{{route('product.update',$product->id)}}" method="post" >
        @csrf
        @method('put')
        <h2>Ajouter Produit</h2>
        <div class="inputs">
            <div class="title">
                <input type="text" name="title" placeholder="Titre" value="{{$product->title}}">
                @error('title')
                    <small>{{$message}}</small>
                @enderror
            </div>

            <div class="quantity">
                <input type="text" name="quantity" placeholder="Quantiee"  value="{{$product->quantity}}">
                @error('quantity')
                    <small>{{$message}}</small>
                @enderror
            </div>

        </div>
        <div class="inputs">
            <div class="pricePurchase">
                <input type="text" name="pricePurchase" placeholder="Prix Achat" value="{{$product->pricePurchase}}">
                @error('quantity')
                    <small>{{$message}}</small>
                @enderror
            </div>
            <div class="price">
                <input type="text" name="price" placeholder="Prix" value="{{$product->price}}">
                @error('quantity')
                    <small>{{$message}}</small>
                @enderror
            </div>
        </div>


        <div class="fournisseur">
            <p>Choisir Fournisseur</p>
            <select name="fournisseur" id="" >
                <option value="{{$product->fourId}}">{{$product->nameFour}}</option>
                @foreach ($fournisseurs as $fournisseur)
                    @if ($fournisseur->id != $product->fourId)
                    <option  value={{$fournisseur->id}}>{{$fournisseur->name}}</option>
                    @endif
                @endforeach
            </select>
            <a href="{{route('fournisseur.create')}}"><button type="button">Ajouter Fournisseur</button></a>
        </div>

        <div class="repo" >
            <p>Choisir Depot</p>
            <select name="depot" id="" >
                <option value="{{$product->depotId}}">{{$product->nameDepot}}</option>
                @foreach ($depots as $depot)
                @if ($depot->id != $product->depotId)
                <option  value={{$depot->id}}>{{$depot->name}}</option>
                @endif
                @endforeach
            </select>
            <a href="{{route('depot.create')}}"><button type="button">Ajouter depot</button></a>
        </div>

        <button>Modifier</button>


    </form>
</div>




    
@endsection