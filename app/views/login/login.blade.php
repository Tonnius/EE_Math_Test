@extends('baselayout')

@section('breadcrumb')
<ul class="uk-breadcrumb">
	<li><a href="/">Avaleht</a></li>
	<li class="uk-active"><span>Logi sisse</span></li>
</ul>
@endsection

@section('content')
			<h1>Logi sisse</h1>


			<div class="uk-width-medium-3-4 uk-container-center">
			<ul class="uk-tab" data-uk-tab="{connect:'#login-options'}">
				<li class="uk-active"><a href="">Kasutajanimi/parool</a></li>
				<li><a href=""><i class="uk-icon-facebook"></i> facebook</a></li>
			</ul>

				@unless($errors->count() == 0)
				<div class="uk-alert uk-alert-danger">
					<ul class="uk-list">
					@foreach($errors->all('<li>:message</li>') as $error)
						{{ $error }}
					@endforeach
					</ul>
				</div>
				@endunless

				@if(Session::has('signup_success'))
				<div class="uk-alert uk-alert-success">{{ Session::get('signup_success') }}</div>
				@endif

				<ul id="login-options" class="uk-switcher uk-margin">
					<li class="uk-active">
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
								<!--a class="uk-float-right uk-link uk-link-muted" href="#">Unustasid parooli?</a-->
							</div>
						</form>
					</li>
					<li class="uk-active">
						<a href="/login/facebook">Logi sisse facebookiga</a>
					</li>
				</ul>
			</div>
@endsection