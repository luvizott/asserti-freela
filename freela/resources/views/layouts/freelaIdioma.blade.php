<?php $i = 0 ?>
@foreach($unique as $user)
	@if($i == 0)
	{{ $user->idioma }} {{ $user->idioma_lv }}<br>
	@endif
<?php $i++ ?>
@endforeach