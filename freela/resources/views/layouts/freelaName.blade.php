<?php $i = 0 ?>
@foreach($unique as $user)

			@if($i == 0)
				@if (($user->provider) != NULL)
					<img src="{{ $user->image }}" alt="{{ $user->image }}"><!-- Se o usuário estiver logado com facebook, a imagem puxada será a do perfil do facebook-->
				@else
					<img alt="{{ $user->image }}" src="{{ env('APP_URL') }}/storage/users/{{ $user->image }}"/> 
				@endif
				
			@endif	
	<?php $i++ ?>

@endforeach