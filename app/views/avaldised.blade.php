@extends('baselayout')

@section('content')
	<h1>Avaldised</h1>
	
	<p>Ülesanne 1</p>
	@if(Session::has('result'))
		<div class="uk-alert uk-alert-success">{{ Session::get('result') }}</div>

	@endif

	<p><?php echo $task->kirjeldus; ?> <!--Õige vastus: {{ $task->korrektne_vastus}}--></p>

	<form class="uk-panel uk-panel-box uk-form" method="post" action="/avaldised">
		<div class="uk-form-row">
			<input name="answer" class="uk-width-1-1 uk-form-large" type="text" placeholder="Vastus" required>
		</div>
		<div>
			<input class="uk-width-1-3 uk-button uk-button-primary uk-button-small" type="submit" value="Vasta">
		</div>
	</form>


@endsection