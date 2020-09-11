<html>
<head>
    <title>Freelas</title>
</head>
<body>

@include('parts/header')

    <div class="container">
        <div class="row">
            @foreach($data as $item)
                <div class="col-md-3 perfil-list">
                    <div>
                        @if (($item->provider) != NULL)
                            <img src="{{ $item->image }}" alt="{{ $item->image }}"><!-- Se o usuário estiver logado com facebook, a imagem puxada será a do perfil do facebook-->
                        @else
                            <img alt="{{ $item->image }}" src="{{ env('APP_URL') }}/storage/users/{{ $item->image }}"/> 
                        @endif
                    </div>
                    <div>
                        {{ $item->name }}
                    </div>
                    <div>
                        {{ $item->email }}
                    </div>
                </div>
            @endforeach
            <div>
                {{ $data->links() }}
            </div>
        </div>
    </div>

@include('parts/footer')

</body>
</html>