@extends('baselayout')

@section('content')
	<h1>Lisa uus ülesanne</h1>
	@if(Session::has('result'))
		<div class="uk-alert uk-alert-success">{{ Session::get('result') }}</div>
	@endif
	<form class="uk-panel uk-panel-box uk-form" method="post" action="/lisaYl">
		<div class="uk-form-row">
			<input name="kirjeldus" class="uk-width-1-1 uk-form-large" type="text" placeholder="Kirjeldus" required />
			<input name="vastus" class="uk-width-1-1 uk-form-large" type="text" placeholder="Korrektne vastus" required />
			<label class="uk-form-label" for="teema">Teema:</label>
			<br />

			<select name="teema">
			@foreach($teemad as $id => $teema)
				<option value="{{$id}}">{{$teema}}</option>
			@endforeach
			</select>
		</div>
		<br />
		<div>
			<input class="uk-width-1-3 uk-button uk-button-primary uk-button-small" type="submit" value="Lisa" />
		</div>
	</form>


@endsection