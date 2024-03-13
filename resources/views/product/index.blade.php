@extends('layout')

@section('title','Les Produits')
    

@section('content')





    <div class="add">
        <a href="{{route('product.create')}}"><button>Ajouter Produit</button></a>
        <form action="{{route('searchProduct')}}" method="post">
            @csrf 
            <div class="search">
                <input type="text" placeholder="Recherche" name="search">
                <button>Recherche</button>
            </div>
        </form>
    </div>



    <div class="tab">
        <table>
            <thead>
                <tr>
                    <th class="titleProduct">Titre</th>
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
                        <td class="titleProduct"><p>{{$product->title}} cxcxvsdvs svvdd df fvdf vdf v dfvdfvdf</p></td>
                        <td>{{$product->quantity}}</td>
                        <td>{{number_format($product->pricePurchase,2)}}</td>
                        <td>{{number_format($product->pricePurchase*$product->quantity,2)}}</td>
                        <td>{{number_format($product->price,2)}}</td>
                        <td>{{$product->nameFour}}</td>
                        <td>{{$product->nameDepot}}</td>
                        <td class="actions">
                            <a href="{{route('product.edit',$product->id)}}"><ion-icon name="sync-outline"></ion-icon></a>
                            
                            <ion-icon name="trash-outline"></ion-icon>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>







    
@endsection