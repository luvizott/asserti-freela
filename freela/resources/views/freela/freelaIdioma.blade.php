<?php $i = 0 ?>
@foreach($unique as $user)
	@if($i == 0 || $i == 2 || $i == 4 || $i == 6 || $i == 8 || $i == 10)
	{{ $user->idioma }} {{ $user->idioma_lv }}<br>
	@endif
	<?php $i++ ?>
@endforeach