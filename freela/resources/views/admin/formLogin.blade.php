<!doctype html>
<html lang="en">
    <head>
        <title>Login</title>
    </head>
    <body class="text-center">
  
    @include('parts/header') <!-- HEADER -->

        <section id="first">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4 login-form">
                        <form class="form-signin" method="post" action="{{ route('admin.login.do')}}">
                        @csrf
                        <img src="{{ asset('storage/images/seta-logo.png') }}" alt="" class="logo-form">
                        @if($errors->all())
                            @foreach($errors->all() as $error)
                            <div class="alert alert-danger" role="alert">
                                {{ $error }}
                            </div>
                            @endforeach
                        @endif
                        <h1 class="h3 mb-3 font-weight-normal">Insira seus dados</h1>
                        
                        <input style="margin-bottom: 15px;" type="text" name="email" id="inputEmail" class="form-control" value="" placeholder="email@exemplo.com" required autofocus>
                        
                        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Senha" required>
                        <div class="checkbox mb-3 mt-3">
                            <label>
                            <input type="checkbox" value="remember-me"> Manter conectado
                            </label>
                        </div>
                        <button class="btn btn-lg enter-btn btn-block mb-2" type="submit">Entrar</button>
                        
                        <div>
                            <p>Ou</p>
                        </div>

                        <div class="mt-3">
                            <a class="lgn-facebook btn btn-lg btn-block mb-2" href="{{ url('/login/facebook') }}"><i class="fa fa-facebook"></i> Entrar com facebook</a>
                        </div>
                        <div class="mt-3">
                            <a class="lgn-google btn btn-lg btn-block mb-2" href="{{ url('/login/google') }}"><i class="fa fa-google"></i> Entrar com Google</a>
                        </div>

                        </form>
                    </div>
                    <div class="col-sm-4"></div>
                </div>
            </div>
        </section>

        @include('parts/footer')

    </body>
</html>
