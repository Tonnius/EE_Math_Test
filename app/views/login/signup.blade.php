@extends('baselayout')

@section('content')
			<h1>Registreeru</h1>

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

				<form class="uk-panel uk-panel-box uk-form" method="post" action="/signup">
					<div class="uk-form-row">
						<input name="username" class="uk-width-1-1 uk-form-large" type="text" placeholder="Kasutajanimi" value="{{Input::old('username')}}" required>
					</div>
					<div class="uk-form-row">
						<input name="password" class="uk-width-1-1 uk-form-large" type="password" placeholder="Parool" required>
					</div>
					<div class="uk-form-row">
						<input name="password_confirmation" class="uk-width-1-1 uk-form-large" type="password" placeholder="Parool uuesti" required>
					</div>
					<div class="uk-form-row">
						<input name="email" class="uk-width-1-1 uk-form-large" type="email" placeholder="E-mail" value="{{Input::old('email')}}" required>
					</div>
					<div class="uk-form-row">
						<input name="email_confirmation" class="uk-width-1-1 uk-form-large" type="email" placeholder="E-mail uuesti" value="{{Input::old('email_confirmation')}}" required>
					</div>
					<div class="uk-form-row">
						{{ Form::captcha(array('theme' => 'white')) }}
					</div>
					<div class="uk-form-row">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<label><input type="checkbox" name="agree" required @if(Input::old('agree')) checked @endif> Nõustun kasutustingimustega</label>
					</div>
					<div class="uk-form-row">
						<input class="uk-width-1-1 uk-button uk-button-primary uk-button-large" type="submit" value="Registreeru">
					</div>
				</form>
			</div>
@endsection