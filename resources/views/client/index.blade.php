@extends('layout')
@section('title','Les Clients')
@section('content')


<div class="add">
    <a href="{{route('client.create')}}"><button>Ajouter Client</button></a>
    <div class="search">
        <input type="text" placeholder="Recherche" name="search">
        <button>Recherche</button>
    </div>
</div>



<div class="tab">
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Telephone</th>
                <th>Address</th>
                <th>Ville</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($clients as $client)
                @if ($client->id != 1)
                    <tr>
                        <td>{{$client->name}}</td>
                        <td>{{$client->phone}}</td>
                        <td>{{$client->adress}}</td>
                        <td>{{$client->city}}</td>
                        <td class="actions">
                            <a href="{{route('client.edit',$client)}}"><ion-icon name="sync-outline"></ion-icon></a>
                            <form action="{{route('client.destroy',$client)}}" method="post">
                                @csrf
                                @method('delete')
                                <button>
                                    <ion-icon name="trash-outline"></ion-icon>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach


        </tbody>
    </table>
</div>
@endsection



