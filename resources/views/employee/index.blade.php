@extends('layout')
@section('title','Les Employee')
@section('content')


<div class="add">
    <a href="{{route('employee.create')}}"><button>Ajouter Empolyee</button></a>
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
                <th>User Name</th>
                <th>Password</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($emps as $emp)
                <tr>
                    <td>{{$emp->name}}</td>
                    <td>{{$emp->phone}}</td>
                    <td>{{$emp->userName}}</td>
                    <td>{{$emp->password}}</td>
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
            @endforeach


        </tbody>
    </table>
</div>


@endsection



