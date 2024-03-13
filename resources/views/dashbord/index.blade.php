@extends('layout')

@section('title','Dashbord')

@section('content')




    <form action="{{route('searchDashbord')}}" method="post">
        @csrf 
        <div class="search">
            <input type="text" placeholder="Recherche" name="search">
            <button>Recherche</button>
        </div>
    </form>

    <div class="vente">
        <div class="tab">
            <table>
                <thead>
                    <tr>
                        <th>Titre</th>
                        <th>Quantitée</th>
                        <th>Prix (DH)</th>
                        <th>Fournisseur</th>
                        <th>dépôt</th>
                        <th>ajouter Panier</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                    
                        <tr>
                            <td>{{$product->title}}</td>
                            <td>{{$product->quantity}}</td>
                            <td>{{number_format($product->price,2)}}</td>
                            <td>{{$product->nameFour}}</td>
                            <td>{{$product->nameDepot}}</td>
                            <td class="addToCart">
                                <form action="{{route('OrderTem.store')}}" method="post">
                                    @csrf
                                    <div class="quantity">
                                        <label for="">Q:</label>
                                        <input type="number" name="quantity" value="1" >
                                        <input type="hidden" name="id"  value="{{$product->id}}">
                                    </div>
                                    <button><ion-icon name="cart-outline"></ion-icon></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
    
                </tbody>
            </table> 
        </div>
        <div class="cart">
            <h2>Panier</h2>



    
            <div class="content">
                    <table>
                        <thead>
                            <tr>
                                <th>Titre</th>
                                <th>prix (DH)</th>
                                <th>Q</th>
                                <th>Totale (DH)</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $totale = 0 ; ?>
                            
                            @foreach ($orderTems as $orderTem)
                                <tr>
                                    <td>{{$orderTem->title}}</td>
                                    <td>{{ number_format($product->price, 2) }}</td>
                                    <td>x{{$orderTem->quantity}}</td>
                                    <td>{{number_format($orderTem->quantity*$orderTem->price,2) }}</td>
                                    <?php $totale += $orderTem->quantity * $orderTem->price; ?>
                                    <td>
                                        <form action="{{route('OrderTem.destroy',$orderTem->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button>
                                                <ion-icon name="trash-outline"></ion-icon>
                                            </button>
                                        </form>

                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <div class="totale">
                        <h3>Totale</h3>
                        <h3>{{number_format($totale,2)}} DH</h3>
                    </div>
                    <form action="{{route('order.store')}}" method="post">
                        @csrf
                        <div class="client">
                            <p>Choisir Fournisseur</p>
                            <select name="client" id="">
                                @foreach ($clients as $client)
                                    <option  value={{$client->id}}>{{$client->name}}</option>
                                @endforeach
                            </select>
                            <a href="{{route('client.create')}}"><button type="button">Ajouter Client</button></a>
                        </div>
                        <button>Confirmer</button>
                    </form>
            </div>
        </div>    

    </div>







    
@endsection