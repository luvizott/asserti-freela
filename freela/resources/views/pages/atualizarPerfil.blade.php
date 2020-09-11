<html>
<head>
<title>Atualizar Perfil</title>
</head>
<body>
    @include('parts/header')

    <div class="container">
        <div class="row">
            <h3>Meu perfil</h3>
        </div>
        <div class="row">
            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="file" name="image" placeholder="Imagem" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" value="{{ auth()->user()->name }}" name="name" placeholder="Nome" class="form-control">
                </div>
                <div class="form-group">
                    <input type="email" value="{{ auth()->user()->email }}" name="email" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" name="password" placeholder="Senha" class="form-control">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-info">Atualizar</button>
                </div>
            </form>
        </div>
    </div>

    @include('parts/footer')
    <script src="{{ url(mix('admin/js/script.js')) }}"></script>
</body>
</html>