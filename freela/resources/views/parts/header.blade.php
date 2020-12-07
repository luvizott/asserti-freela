<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asserti Freela</title>

    <link rel="stylesheet" href="{{ asset('site/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header class="masthead menu">
        <div class="container">
            <div class="inner text-center">
            <a href="{{ route('site.home') }}"> <img src="{{ asset('storage/images/logo-site.png') }}" alt="" class="logo-nav"></a>

            <div class="dropdownmob">
                <button class="dropmob"><i class="fa fa-bars"></i></button>
                <div class="dropdownmob-mobile">
                    @if (Route::has('login'))
                        @auth
                        <a class="nav-link" href="{{ route('site.home') }}">Home</a>
                        <a class="nav-link" target="_blank" href="http://asserti.org">Asserti</a>
                        <a class="nav-link" target="_blank" href="http://vagas.asserti.org.br">Vagas</a>
                        <a class="nav-link" href="{{ route('freelas') }}">Freelas</a>
                        <a class="nav-link" href="{{ url('/perfil') }}">Perfil</a>
                        <a class="nav-link" href="{{ route('perfil.logout') }}">Logout</a>
                    @else
                        <a class="nav-link" href="{{ route('site.home') }}">Home</a>
                        <a class="nav-link" target="_blank" href="http://asserti.org">Asserti</a>
                        <a class="nav-link" target="_blank" href="http://vagas.asserti.org.br">Vagas</a>
                        <a class="nav-link" href="{{ route('freelas') }}">Freelas</a>
                        <a class="nav-link" href="{{ route('formLogin') }}">Login</a>
                        <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                        @endauth
                    @endif
                </div>
            </div>

            <nav class="nav nav-masthead justify-content-center">
            @if (Route::has('login'))
                    @auth
                    <a class="nav-link" href="{{ route('site.home') }}">Home</a>
                    <a class="nav-link" target="_blank" href="http://asserti.org">Asserti</a>
                    <a class="nav-link" target="_blank" href="http://vagas.asserti.org.br">Vagas</a>
                    <a class="nav-link" href="{{ route('freelas') }}">Freelas</a>
                    <a class="nav-link" href="{{ url('/perfil') }}">Perfil</a>
                    <a class="nav-link" href="{{ route('perfil.logout') }}">Logout</a>
                    @else
                        <a class="nav-link" href="{{ route('site.home') }}">Home</a>
                        <a class="nav-link" target="_blank" href="http://asserti.org">Asserti</a>
                        <a class="nav-link" target="_blank" href="http://vagas.asserti.org.br">Vagas</a>
                        <a class="nav-link" href="{{ route('freelas') }}">Freelas</a>
                        <a class="nav-link" href="{{ route('formLogin') }}">Login</a>
                        <a class="nav-link" href="{{ route('register') }}">Registrar</a>
                    @endauth
            </nav>
            </div>
        </div>
            @endif
    </header>

    <script src="{{ asset('site/jquery.js') }}"></script>
    <script src="{{ asset('site/bootstrap.js') }}"></script>
    <script src="{{ asset('site/js/script.js') }}"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</body>
</html>