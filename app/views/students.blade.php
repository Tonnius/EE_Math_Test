@extends('baselayout')

@section('content')
	<table class="uk-table uk-table-striped">
		<thead>
			<tr>
				<th>Kasutajanimi</th>
				<th>Ligipääsuõigus</th>
			</tr>
		</thead>
		<tbody>
			@foreach($data as $user)
			<tr>
				<td><a href="/opil/{{$user->id}}">{{$user->username}}</a></td>
				@if($user->user_level == 'administrator')
				<td>Administraator</td>
				@else
				<td>Tavakasutaja</td>
				@endif
			</tr>
			@endforeach
		</tbody>
	</table>

	<ul class="uk-pagination">
    	<?php echo with(new UikitPresenter($data))->render(); ?>
	</ul>

@endsection
