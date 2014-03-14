@extends('baselayout')

@section('content')
			<h1>Logi sisse</h1>

			<div class="uk-width-medium-3-4 uk-container-center">

				@unless($errors->count() == 0)
				<div class="uk-alert uk-alert-danger">
					<ul class="uk-list">
					@foreach($errors->all('<li>:message</li>') as $error)
						{{ $error }}
					@endforeach
					</ul>
				</div>
				@endunless

				@if(isset($signup_success))
				<div class="uk-alert uk-alert-success">{{ $signup_success }}</div>
				@endif

				<form class="uk-panel uk-panel-box uk-form" method="post" action="/login">
					<div class="uk-form-row">
						<input name="username" class="uk-width-1-1 uk-form-large" type="text" placeholder="Kasutajanimi" value="{{Input::old('username')}}" required>
					</div>
					<div class="uk-form-row">
						<input name="password" class="uk-width-1-1 uk-form-large" type="password" placeholder="Parool" required>
					</div>
					<div class="uk-form-row">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input class="uk-width-1-1 uk-button uk-button-primary uk-button-large" type="submit" value="Logi sisse">
					</div>
					<div class="uk-form-row uk-text-small">
						<label class="uk-float-left"><input type="checkbox" name="remember" @if(Input::old('remember')) checked @endif> Jäta mind meelde</label>
						<a class="uk-float-right uk-link uk-link-muted" href="#">Unustasid parooli?</a>
					</div>
				</div>
			</div>
@endsection