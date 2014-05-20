@extends('baselayout')

@section('breadcrumb')
<ul class="uk-breadcrumb">
	<li><a href="/">Avaleht</a></li>
	<li class="uk-active"><span>Lisa ülesanne</span></li>
</ul>
@endsection

@section('content')
	<h1>Lisa uus ülesanne</h1>
	@if(Session::has('result'))
		<div class="uk-alert uk-alert-success">{{ Session::get('result') }}</div>
	@endif
	<form class="uk-panel uk-panel-box uk-form" method="post" action="/lisaYl" enctype="multipart/form-data">
		<div class="uk-form-row">
			<input name="kirjeldus" class="uk-width-1-1 uk-form-large" type="text" placeholder="Kirjeldus" required="required" />
		</div>

		<div class="uk-form-row">
			<input name="vastus" class="uk-width-1-1 uk-form-large" type="text" placeholder="Korrektne vastus" required />
		</div>

		<div class="uk-form-row">
			<label class="uk-form-label" for="pilt">Kirjeldav pilt (png, gif, jpeg, jpg):</label>
			<input id="pilt" name="pilt" class="uk-width-1-1 uk-form-large" type="file" placeholder="Pilt" />
		</div>

		<div class="uk-form-row">
			<label class="uk-form-label" for="teema">Teema: 
			<select id="teema" name="teema">
			@foreach($teemad as $id => $teema)
				<option value="{{$id}}">{{$teema}}</option>
			@endforeach
			</select>
			</label>
		</div>

		<div class="uk-form-row">
			<input class="uk-width-1-3 uk-button uk-button-primary uk-button-small" type="submit" value="Lisa" />
		</div>
	</form>


@endsection