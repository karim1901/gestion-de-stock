@extends('layout')
@section('title','Les Employeeloyee')
@section('content')
<div class="form">
    <form action="{{route('employee.update',$employee)}}" method="post">
        @csrf
        @method('put')
        <h2>Modifier Employee</h2>
        <div class="inputs">
            <div class="title">
                <input type="text" name="name" placeholder="Nom" value={{$employee->name}}/>
                @error('name')
                    <small>{{$message}}</small>
                @enderror
            </div>

            <div class="quantity">
                <input type="text" name="phone" placeholder="Telephone" value={{$employee->phone}} />
                @error('phone')
                    <small>{{$message}}</small>
                @enderror
            </div>

        </div>
        <div class="inputs">
            <div class="pricePurchase">
                <input type="text" name="userName" placeholder="User Name"  value={{$employee->userName}} />
                @error('userName')
                    <small>{{$message}}</small>
                @enderror
            </div>
            <div class="price">
                <input type="text" name="password" placeholder="Password" value={{$employee->password}}>
                @error('password')
                    <small>{{$message}}</small>
                @enderror
            </div>
        </div>


        <button>Modifier</button>

        {{-- <select name="fournisseurs" >

        </select> --}}

    </form>
</div>
@endsection