@extends('layout')
@section('title','Les Employee')
@section('content')


<div class="add">
    <a href="{{route('employee.create')}}"><button>Ajouter Empolyee</button></a>
    <form action="{{route('searchEmployee')}}" method="post">
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
                <th>Telephone</th>
                <th>User Name</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($emps as $emp)
                @if ($emp->role != 'admin')
                    <tr>
                        <td>{{$emp->name}}</td>
                        <td>{{$emp->phone}}</td>
                        <td>{{$emp->userName}}</td>
                        <td>{{$emp->code}}</td>
                        <td class="actions">
                            <a href="{{route('employee.edit',$emp)}}"><ion-icon name="sync-outline"></ion-icon></a>
                            <form action="{{route('employee.destroy',$emp)}}" method="post">
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



