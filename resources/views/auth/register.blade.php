<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="/css/styleLoginAdmin.css">
    <title>Register</title>
</head>
<body>

    <div class="container-login">
        <div class="logo-login" style="display: flex; justify-content: center">
            <h1><img src="/img/logo.png" class="img_logo_login" alt="Logo"> Register</h1>
        </div>
        <hr>
        <div class="container-form">
            <form action="{{ route('register') }}" method="post">
                @csrf
                <div class="container-input">
                    <input type="text" name="name" id="name" placeholder="Insira seu nome" class="input-login" required autofocus autocomplete="name">
                </div>
                <div class="container-input">
                    <input type="email" name="email" id="email" placeholder="Insira o login" class="input-login" :value="old('email')" required>
                </div>
                <div class="container-input">
                    <input type="password" name="password" id="password" placeholder="Insira a senha" class="input-login" required autocomplete="new-password">
                </div>
                <div class="container-input">
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirme sua senha" class="input-login" required autocomplete="new-password">
                </div>


                <div style="text-align:center">
                    <button type="submit" class="btn-enviar">Cadastre-se</button>
                </div>

                <div class="links">
                    <a class="link" href="/login">
                        Já possui uma conta? entre
                    </a>
                </div>
            </form>
        </div>
    </div>{{--container-login--}}


</body>
</html>
