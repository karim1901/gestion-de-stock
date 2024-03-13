<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('css/facture.css')}}">
    <title>Factuer</title>
</head>
<body>

    <button onclick="impriemr()" class="print">Imprimer</button>

    <div class="facture">
        <h1>Factuer</h1>
        <p>Date Facture : {{$order[0]->date}}</p>
        <div class="infoClient">
            <h3>Vendeur : {{$order[0]->supplier}}</h3>
            <h3>Client</h3>
            <p>Nom : {{$order[0]->nameClient}}</p>
            <p>phone :  {{$order[0]->phoneClient}}</p>
            <p>address :  {{$order[0]->adressClient}}  {{$order[0]->cityClient}}</p>
        </div>

        <table>
            <tr>
                <th>Titre</th>
                <th>Qté</th>
                <th>Prix (DH)</th>
                <th>Totale (DH)</th>
            </tr>

            @foreach ($order as $product)
                <tr>
                    <td><p>{{$product->title}}  </p> </td>
                    <td><small>{{$product->quantity}} </small></td>
                    <td><small>{{number_format($product->price,2)}} </small></td>
                    <td><small>{{number_format($product->price*$product->quantity,2)}} </small></td>
                </tr>
            @endforeach

        </table>

        <hr>
        <h3>Totale : {{number_format($product->totale,2)}} DH</h3>



    </div>

    <script>


        document.querySelector('.print').addEventListener('click',function(){
            this.classList.add('active');
            print()
        })


    </script>
</body>
</html>