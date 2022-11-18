<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/styleLoginAdmin.css">
    <title>Login</title>
</head>
<body>

    <div class="container-login">
        <div class="logo-login" style="display: flex; justify-content: center">
            <h1><img src="/img/logo.png" class="img_logo_login" alt="Logo"> Login</h1>
        </div>
        <hr>
        <div class="container-form">
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="container-input">
                    <input type="text" name="email" id="email" placeholder="Insira o login" class="input-login" :value="old('email')" required autofocus>
                </div>
                <div class="container-input">
                    <input type="password" name="password" id="password" placeholder="Insira a senha" class="input-login" required autocomplete="current-password">
                </div>
                <div style="text-align:center">
                    <button type="submit" class="btn-enviar">Enviar</button>
                </div>

                @if (Route::has('password.request'))
                <div class="links">
                    <a class="link" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                    <a class="link" href="/register">
                        Não tem conta? registre-se
                    </a>
                </div>
                @endif
            </form>
        </div>
    </div>{{--container-login--}}


</body>
</html>

