@extends('baselayout')

@section('content')
	@if(Session::has('csrf_error'))
	<div class="uk-alert uk-alert-danger">{{Session::get('csrf_error')}}</div>
	@endif

	@if(Session::has('logout_message'))
	<div class="uk-alert uk-alert-success">{{Session::get('logout_message')}}</div>
	@endif
	<h1>Matemaatika riigieksamiks õppimine.<br /> Lihtsamalt.</h1>
	
	<p>Matemaatikast on võimalik mõelda ka teisiti. Veendu selles järgmist videot vaadates.</p>

	<div class="videoOuter">
		<div class="videoWrapper">
			<iframe width="520" height="390" src="//www.youtube-nocookie.com/embed/J_0d19vJtB0?rel=0" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>

	<div class="container">

		<?php AssetProcessor::add('protip', '../app/assets/js/protip.js', ['group' => 'footer']); ?>
		<a href="#tip" id="protip">
			<i class="icon icon-refresh"></i> Tänane nõuanne õppimiseks! &raquo;
		</a>

		<div id="tip"></div>
	</div>
@endsection