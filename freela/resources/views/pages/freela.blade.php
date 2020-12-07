@include('parts/header')

<div class="container">
	<div class="row">
		<?php $i = 0 ?>
		<div class="col-md-12 empdiv">
			<div class="row">
				<div class="col-md-3 sep">
					@include('freela/freelaName')
				</div>
				<div class="col-md-3 sep">
					@foreach($user as $user)
						@if( $i == 0)
						<h3>{{ $user->name }}</h3>
						<strong>Idade: </strong> {{ \Carbon\Carbon::parse($user->birth)->age }}<br>
						<strong>Cidade:</strong> {{ $user->cidade }} - {{ $user->uf }}<br>
						<strong>Email: </strong> {{ $user->email }}<br>
						<strong>Telefone: </strong> {{ $user->cell }} <br>
						<strong>Github: </strong> 
							@if(isset($user->github))
								{{ $user->github }}<br>
							@else
								Não vinculado <br>
							@endif
						<strong>Linkedin: </strong> 
							@if(isset($user->github))
								{{ $user->github }}
							@else
								Não vinculado
							@endif
						@endif
						<?php $i++ ?>
					@endforeach
				</div>
				<div class="col-md-3 sepf">
					<h4>Idiomas</h4>
					@include('freela/freelaIdioma')
				</div>
				<div class="col-md-3 sepf">
					<h4>Tecnologias</h4>
					@include('freela/freelaTec')
				</div>
			</div>
		</div>
	</div>
</div>

@include('parts/footer')