@extends('layout')
@section('title','Les Depots')


@section('content')
<div class="add">
    <a href="{{route('depot.create')}}"><button>Ajouter depot</button></a>
    <form action="{{route('searchDepot')}}" method="post">
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
                <th>Nom</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($depots as $depot)
                @if ($depot->id != 1)
                    <tr>
                        <td>{{$depot->name}}</td>
                        <td>{{$depot->adress}}</td>
                        <td class="actions">
                            <ion-icon name="eye-outline"></ion-icon>
                            <ion-icon name="sync-outline"></ion-icon>
                            <ion-icon name="trash-outline"></ion-icon>
                        </td>
                    </tr>
                @endif
            @endforeach


        </tbody>
    </table>
</div>

@endsection



