<?php $i = 0 ?>
@foreach($unique as $user)
	@if($i == 0)
	{{ $user->cidade }} - {{ $user->uf }}<br>
	@endif
<?php $i++ ?>
@endforeach