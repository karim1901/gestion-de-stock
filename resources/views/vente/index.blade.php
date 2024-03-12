@extends('layout')

@section('title','Ventes')

@section('content')




    <div class="search">
        <div class="date">
            <label for="">Année</label>
            <select name="" id="">
                <option value="">Tous</option>
                <option value="">2024</option>
                <option value="">2023</option>
                <option value="">2022</option>
            </select>
            <label for="">Mois</label>
            <select name="" id="">
                <option value="">Tous</option>
                <option value="">1</option>
                <option value="">2</option>
                <option value="">3</option>
                <option value="">4</option>
                <option value="">5</option>
                <option value="">6</option>
                <option value="">7</option>
                <option value="">8</option>
                <option value="">9</option>
                <option value="">10</option>
                <option value="">11</option>
                <option value="">12</option>
            </select> 
            <label for="">Jour</label>
            <input type="text" placeholder="Joure" name="day">
                                            
        </div>
        <button>Recherche</button>
    </div>
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
                        <td>{{$order->nameEmp}}</td>
                        <td>{{$order->nameClient}}</td>
                        <td>{{$order->totale}}00</td>
                        <td>-</td>
                        <td>{{$order->dateOrder}}</td>
                        <td>
                            <ion-icon name="print-outline"></ion-icon>
                        </td>
                    </tr>
                @endforeach

                
            </tbody>
        </table>   
    </div>






    
@endsection