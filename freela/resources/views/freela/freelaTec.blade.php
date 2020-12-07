@foreach($unique->unique('tecnology') as $user)
	{{ $user->tecnology }} {{ $user->nivel }}<br>
@endforeach