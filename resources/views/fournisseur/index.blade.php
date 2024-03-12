@extends('layout')
@section('title','Les Founrnisseurs')
@section('content')


<div class="add">
    <a href="{{route('fournisseur.create')}}"><button>Ajouter Fournisseur</button></a>
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
                <th>email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fournisseurs as $fournisseur)
                @if ($fournisseur->id != 1)
                    <tr>
                        <td>{{$fournisseur->name}}</td>
                        <td>{{$fournisseur->phone}}</td>
                        <td>{{$fournisseur->adress}}</td>
                        <td>{{$fournisseur->email}}</td>
                        <td class="actions">
                            <a href="{{route('fournisseur.edit',$fournisseur)}}"><ion-icon name="sync-outline"></ion-icon></a>
                            <form action="{{route('fournisseur.destroy',$fournisseur)}}" method="post">
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



