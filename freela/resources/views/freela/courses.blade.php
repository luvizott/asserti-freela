<?php $i = 0 ?>
@foreach($unique as $user)

	{{ $user->curso }} {{ $user->institute }}<br>

<?php $i++ ?>
@endforeach