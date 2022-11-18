<?php
    $user = auth()->user();

    if ($user) {
        $productsincart = $user->cart->toArray();
        $quantityCart = count($productsincart);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/img/logo.png" type="image/x-icon">
    @yield('links')
    <title>@yield('title')</title>
</head>
<body>
    <header id="header">
        <h1 style="display:none">PEG Sports</h1>
        <h2 style="display:none">Artigos Esportivos</h2>
        <div class="navbar">
            <div class="navbar-head">
                <div class="img_logo">
                    <a href="/"><img src="/img/logo.png" class="logo" id="logo" alt="Logo"></a>
                </div>{{--img logo--}}

                <div class="form_search-box">
                    <form action="/search" method="get">
                        <input type="search" class="form_search" name="search" id="search" placeholder="O que você procura?">
                    </form>
                </div>{{--form search--}}

                <div class="options">
                    @guest
                        <a href="{{route('login')}}"><ion-icon style="font-size: 15pt; margin-right: 5px;" name="person-circle-outline"></ion-icon> Entre ou cadastre-se</a>
                    @endguest
                    @auth
                        <a href="/cart">
                            <ion-icon style="font-size: 25px;" name="cart"></ion-icon>
                            <div class="quantity-in-car">
                                @if ($quantityCart < 10)
                                    {{$quantityCart}}
                                @else
                                    9+
                                @endif
                            </div>
                        </a>
                        <a href="/logout"><ion-icon style="font-size: 25px;" name="log-out-outline"></ion-icon></a>
                    @endauth
                </div>{{--options--}}
            </div>{{--navbar-head--}}
        </div>{{--navbar--}}
        <div class="search-min-screen">
            <div class="form_search-box-min">
                <form action="/search" method="get">
                    <input type="text" class="form_search" name="search" id="search" placeholder="O que você procura?">
                </form>
            </div>{{--form search--}}
        </div>
    </header>

    @yield('content')


    <script  type = "module"  src = "https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script  nomodule  src = "https://unpkg .com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
