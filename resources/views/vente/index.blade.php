@extends('layout')

@section('title','Ventes')

@section('content')



    <form action="{{route('searchVente')}}" method="post">
        @csrf
        <div class="search">

            <div class="date">
                <label for="">Année</label>

                <select name="year" id="">
                    <option value="">Tous</option>
                    @foreach ($dateOredrs->unique('yearOrder') as $dateOredr)
                        <option value='{{$dateOredr->yearOrder}}'>{{$dateOredr->yearOrder}}</option>
                    @endforeach
                </select>
                <label for="">Mois</label>
                <select name="month" id="">
                    <option value="">Tous</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                    <option value="7">7</option>
                    <option value="8">8</option>
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option>
                    <option value="12">12</option>
                </select> 
                <label for="">Jour</label>
                <input type="text" placeholder="Joure" name="day" >
                                                
            </div>
            <button>Recherche</button>
        </div>
    </form>

    <div class="tab">
        <table>
            <thead>
                <tr>
                    <th>Vendeur</th>
                    <th>L'acheteur</th>
                    <th>Totale (DH)</th>
                    <th>Profit (DH)</th>
                    <th>Date de vente</th>
                    <th>Facture</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{$order->nameSupplier}}</td>
                        <td>{{$order->nameClient}}</td>
                        <td>{{number_format($order->totale,2)}}</td>
                        @foreach ($orders_profite as $order_profite)
                            @if ($order_profite->id == $order->id) 
                                <td>{{number_format($order->totale-$order_profite->totalePur,2)}}</td>
                            @endif
                        @endforeach
                        <td>{{$order->dateOrder}}</td>
                        <td>
                            <a href="{{ route('facture', $order->id) }}"><ion-icon name="print-outline"></ion-icon></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>   
    </div>






    
@endsection