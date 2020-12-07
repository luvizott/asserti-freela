<?php $i = 0 ?>
@foreach($user as $user)

	
			@if($i == 0)
				@if (($user->provider) != NULL)
					<img src="{{ $user->image }}" alt="{{ $user->image }}"><!-- Se o usuário estiver logado com facebook, a imagem puxada será a do perfil do facebook-->
				@else
					<img alt="{{ $user->image }}" src="{{ env('APP_URL') }}/users/{{ $user->image }}"/> 
				@endif
				@if($user->status == "inidisponivel")
				<center><strong>Status:</strong> Indisponível</center>
				@else
				<br><br><center><strong class="mt-3">Disponibilidade: </strong>  {{ $user->dispon }}</center>
				<center><strong>Atualizado em: </strong>{{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y') }}</center>
				@endif
			@endif
		
	<?php $i++ ?>

@endforeach