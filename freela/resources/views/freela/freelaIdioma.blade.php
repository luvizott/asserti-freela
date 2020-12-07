
@foreach($unique->unique('idioma') as $user)
	{{ $user->idioma }} {{ $user->idioma_lv }}<br>
@endforeach