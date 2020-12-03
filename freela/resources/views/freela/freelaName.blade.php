<?php $i = 0 ?>
@foreach($user as $user)

	<div class="row">
		<div class="col-md-4">
			@if($i == 0)
				@if (($user->provider) != NULL)
					<img src="{{ $user->image }}" alt="{{ $user->image }}"><!-- Se o usuário estiver logado com facebook, a imagem puxada será a do perfil do facebook-->
				@else
					<img alt="{{ $user->image }}" src="{{ env('APP_URL') }}/users/{{ $user->image }}"/> 
				@endif
		
			@endif
		</div>
	</div>	
	<?php $i++ ?>

@endforeach