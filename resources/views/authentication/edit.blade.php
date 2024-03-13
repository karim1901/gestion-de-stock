@extends('layout')

@section('content')
<div class="form">



    <form action="{{route('update')}}" method="post">
        @csrf
        <h2>Modifier Admin</h2>
        @if (session('success'))
        <p >{{ session('success') }}</p>
        @endif
        <div class="inputs admin">
            <div class="title">
                <input type="text" name="passwordOld" placeholder="Mot de passe">
                @error('passwordOld')
                    <small>{{$message}}</small>
                @enderror
            </div>
            <div class="price">
                <input type="text" name="password" placeholder="Nouveau mot de passe">
                @error('password')
                    <small>{{$message}}</small>
                @enderror
            </div>
            <div class="quantity">
                <input type="text" name="password_confirmation" placeholder="Confirmez le mot de passe">
                @error('password_confirmation')
                    <small>{{$message}}</small>
                @enderror
            </div>

        </div>


        <button>Modifier</button>

    </form>
                
</div>    
    
@endsection