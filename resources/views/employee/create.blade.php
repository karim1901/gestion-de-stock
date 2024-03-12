@extends('layout')
@section('title','Les Employee')
@section('content')
<div class="form">
    <form action="{{route('employee.store')}}" method="post">
        @csrf
        <h2>Ajouter Employee</h2>
        <div class="inputs">
            <div class="title">
                <input type="text" name="name" placeholder="Nom">
                @error('name')
                    <small>{{$message}}</small>
                @enderror
            </div>

            <div class="quantity">
                <input type="text" name="phone" placeholder="Telephone">
                @error('phone')
                    <small>{{$message}}</small>
                @enderror
            </div>

        </div>
        <div class="inputs">
            <div class="pricePurchase">
                <input type="text" name="userName" placeholder="User Name">
                @error('userName')
                    <small>{{$message}}</small>
                @enderror
            </div>
            <div class="price">
                <input type="text" name="password" placeholder="Password">
                @error('password')
                    <small>{{$message}}</small>
                @enderror
            </div>
        </div>


        <button>Ajouter</button>

        {{-- <select name="fournisseurs" >

        </select> --}}

    </form>
</div>
@endsection