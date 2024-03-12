@extends('layout')
@section('title','Les clients')
@section('content')
<div class="form">
    <form action="{{route('depot.update',$depot)}}" method="post">
        @csrf
        @method('put')
        <h2>Modifier Employee</h2>
        <div class="inputs">
            <div class="title">
                <input type="text" name="name" placeholder="Nom" value={{$depot->name}}>
                @error('name')
                    <small>{{$message}}</small>
                @enderror
            </div>

            <div class="quantity">
                <input type="text" name="phone" placeholder="Telephone" value={{$depot->phone}} >
                @error('phone')
                    <small>{{$message}}</small>
                @enderror
            </div>

        </div>
        <div class="inputs">
            <div class="pricePurchase">
                <input type="text" name="adress" placeholder="Address"  value={{$depot->adress}} >
                @error('userName')
                    <small>{{$message}}</small>
                @enderror
            </div>
            <div class="price">
                <input type="text" name="city" placeholder="Ville" value={{$depot->city}} >
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