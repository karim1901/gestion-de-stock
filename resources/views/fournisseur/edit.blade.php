@extends('layout')
@section('title','Les Fournisseurs')
@section('content')
<div class="form">
    <form action="{{route('fournisseur.update',$fournisseur)}}" method="post">
        @csrf
        @method('put')
        <h2>Modifier Fournisseurs</h2>
        <div class="inputs">
            <div class="title">
                <input type="text" name="name" placeholder="Nom" value={{$fournisseur->name}}>
                @error('name')
                    <small>{{$message}}</small>
                @enderror
            </div>

            <div class="quantity">
                <input type="text" name="phone" placeholder="Telephone" value={{$fournisseur->phone}} >
                @error('phone')
                    <small>{{$message}}</small>
                @enderror
            </div>

        </div>
        <div class="inputs">
            <div class="pricePurchase">
                <input type="text" name="adress" placeholder="Address"  value={{$fournisseur->adress}} >
                @error('userName')
                    <small>{{$message}}</small>
                @enderror
            </div>
            <div class="price">
                <input type="text" name="email" placeholder="Email" value={{$fournisseur->email}} >
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