@extends('layout')

@section('title','Les Produits')
    

@section('content')





    <div class="add">
        <a href="{{route('product.create')}}"><button>Ajouter Produit</button></a>
        <div class="search">
            <input type="text" placeholder="Recherche" name="search">
            <button>Recherche</button>
        </div>
    </div>



    <div class="tab">
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Quantitée</th>
                    <th>Prix Achat (DH)</th>
                    <th>Total (DH)</th>
                    <th>Prix (DH)</th>
                    <th>Fournisseur</th>
                    <th>dépôt</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{$product->title}}</td>
                        <td>{{$product->quantity}}</td>
                        <td>{{$product->pricePurchase}},00</td>
                        <td>{{$product->pricePurchase*$product->quantity}},00</td>
                        <td>{{$product->price}},00</td>
                        <td>{{$product->nameFour}}</td>
                        <td>{{$product->nameDepot}}</td>
                        <td class="actions">
                            <ion-icon name="sync-outline"></ion-icon>
                            <ion-icon name="trash-outline"></ion-icon>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>







    
@endsection