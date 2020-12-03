<?php $i = 0 ?>
@foreach($unique as $user)
	@if($i == 0 || $i == 1 || $i == 4 || $i == 5 || $i == 8 || $i == 9 || $i == 12 || $i == 13 || $i == 16 || $i == 17 || $i == 20 || $i == 21)
	{{ $user->tecnology }} {{ $user->nivel }}<br>
	@endif
<?php $i++ ?>
@endforeach