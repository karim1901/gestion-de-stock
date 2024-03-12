@extends('layout')
@section('title','Les Depots')
@section('content')
<div class="form">
    <form action="{{route('depot.store')}}" method="post">
        @csrf
        <h2>Ajouter Depot</h2>
        <div class="inputs">
            <div class="title">
                <input type="text" name="name" placeholder="Nom">
                @error('name')
                    <small>{{$message}}</small>
                @enderror
            </div>

            <div class="quantity">
                <input type="text" name="adress" placeholder="Address">
                @error('adress')
                    <small>{{$message}}</small>
                @enderror
            </div>

        </div>

        <button>Ajouter</button>


    </form>
</div>
@endsection