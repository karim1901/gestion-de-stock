<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{url('css/style.css')}}">

    <title>@yield('title')</title>
</head>
<body>


    @auth
        <x-navbar :user="$admin" />

        <div class="containerContent">

            <x-side />

            <div class="container active">
                <div class="header">
                    <ion-icon onclick="toggleMenu()" name="menu-outline"></ion-icon>
                    <p>@yield('title')</p>
                </div>
                
                @yield('content')

            </div>
        </div>

    @else    
        @yield('content')
    @endauth











    
    <script src="{{url('js/main.js')}}"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</body>
</html>