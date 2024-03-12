@extends('layout')
@section('title','Les clients')
@section('content')
<div class="form">
    <form action="{{route('client.update',$client)}}" method="post">
        @csrf
        @method('put')
        <h2>Modifier Employee</h2>
        <div class="inputs">
            <div class="title">
                <input type="text" name="name" placeholder="Nom" value={{$client->name}}>
                @error('name')
                    <small>{{$message}}</small>
                @enderror
            </div>

            <div class="quantity">
                <input type="text" name="phone" placeholder="Telephone" value={{$client->phone}} >
                @error('phone')
                    <small>{{$message}}</small>
                @enderror
            </div>

        </div>
        <div class="inputs">
            <div class="pricePurchase">
                <input type="text" name="adress" placeholder="Address"  value={{$client->adress}} >
                @error('userName')
                    <small>{{$message}}</small>
                @enderror
            </div>
            <div class="price">
                <input type="text" name="city" placeholder="Ville" value={{$client->city}} >
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