@extends('layout')

@section('content')
<div class="containerLogin"> 
    
    <div class="main"> 

        <div class="container b-container" id="b-container">
            <form class="form" id="b-form" method="post" action="{{route('loginOrSignUp')}}">
                @csrf
                <h2 class="form_title title">Sign in to Website</h2>
                <input class="form__input" name="userName" type="text" placeholder="User Name">
                <input class="form__input" name="password" type="password" placeholder="Password">
                <input type="hidden" name="req" value="login">
                <a class="form__link">Forgot your password?</a>
                <button class="form__button button submit">SIGN IN</button>
            </form>
        </div>


    </div>
                
</div>    
    
@endsection