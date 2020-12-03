@include('parts/header')

<div class="container">
	<div class="row">
		<div class="col-md-12">
			@foreach($data  as $user)

			<div class="row contact-freela">
				<div class="col-md-4 img-freela text-center">
					@if (($user->provider) != NULL)
                        <img src="{{ $user->image }}" alt="{{ $user->image }}"><!-- Se o usuário estiver logado com facebook, a imagem puxada será a do perfil do facebook-->
                    @else
                        <img alt="{{ $user->image }}" src="{{ env('APP_URL') }}/users/{{ $user->image }}"/> 
                    @endif
					<h3 class="mt-3">{{ $user->name }}</h3>
					
				</div>
				<div class="col-md-7">
					{{ $user->idioma }} {{ $user->idioma_lv }}
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>

@include('parts/footer')