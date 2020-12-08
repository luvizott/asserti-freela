<html>
<head>
    <title>Freelas</title>
</head>
<body>

@include('parts/header')

    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <?php $i=1 ?>
                    @foreach($data  as $user)
                    @if($user->id == $i)
                        <div class="col-md-4 perfil-list mt-3">
                            <div class="row">
                                <div class="col-md-12">
                                    @if (($user->provider) != NULL)
                                        <img src="{{ $user->image }}" alt="{{ $user->image }}"><!-- Se o usuário estiver logado com facebook, a imagem puxada será a do perfil do facebook-->
                                    @else
                                        <img alt="{{ $user->image }}" src="{{ env('APP_URL') }}/storage/users/{{ $user->image }}"/> 
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <h4>{{ $user->name }}</h4>
                                </div>
                                <div class="col-md-12 text-left">
                                @if ($user->birth != null)
                                    <strong>Idade:</strong> {{ \Carbon\Carbon::parse($user->birth)->age }}
                                @else
                                    {{ $user->birth }}
                                @endif 
                                    <strong class="ml-2">Cidade:</strong> {{ $user->cidade }}
                                </div>
                                <div class="col-md-12 text-left">
                                    <strong>Email: </strong>{{ $user->email }}
                                </div>
                                <div class="col-md-12 mt-3">
                                    <a class="btn btn-warning" href="{{ route('freelaById', $user->id) }}">Ver Perfil</a>
                                </div>
                               
                            </div>
                        </div>
                        <?php $i++ ?>
                    @endif
                    @endforeach
                </div>
            </div>
            <div class="col-md-3 filter">
                <h3>Filtros</h3>

                <form action="{{ route('freelas.search') }}" method="post">
                    @csrf
                    <div class="row">
                         <div class="col-md-12">
                            <center>Idioma</center>
                            <select class="filter_input mt-2" name="filter" id="">
                                <option value="">- Selecionar -</option>
                                <option value="Inglês">Inglês</option>
                                <option value="Espanhol">Espanhol</option>
                                <option value="Italiano">Italiano</option>
                                <option value="Francês">Francês</option>
                                <option value="Mandarim">Mandarim</option>
                            </select>
                        </div>
                        <div class="col-md-12 mt-3">
                            <center>Cidade</center>
                            <input class="input-filter" type="text" name="filter2" placeholder="Ex: Marília">
                        </div>
                        <div class="col-md-12 mt-3">
                            <center>Linguagem</center>
                            <input class="input-filter" type="text" name="filter3" placeholder="Ex: Php">
                        </div>
                        <div class="col-md-6">
                            <button class="mt-4 btn btn-warning" type="submit">Filtrar</button>
                        </div>
                        <div class="col-md-6">
                            @if(route(\Request::route()->getName()) == 'https://freela.asserti.org.br/freelas/search')
                                <a class="btn btn-danger mt-4" href="{{ route('freelas') }}">Limpar</a>
                            @endif
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-12 paginate-div mt-5">
                {{ $data->links() }}
            </div>
        </div>
    </div>

@include('parts/footer')

</body>
</html>