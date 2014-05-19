@extends('baselayout')

@section('content')
	@if(Session::has('csrf_error'))
	<div class="uk-alert uk-alert-danger">{{Session::get('csrf_error')}}</div>
	@endif

	@if(Session::has('logout_message'))
	<div class="uk-alert uk-alert-success">{{Session::get('logout_message')}}</div>
	@endif
	<h1>Matemaatika riigieksamiks õppimine.<br /> Lihtsamalt.</h1>
	
	
	
	<iframe width="420" height="315" src="//www.youtube.com/embed/J_0d19vJtB0" frameborder="0" allowfullscreen></iframe><br /><br />
	<div class="container">

		<?php AssetProcessor::add('protip', '../app/assets/js/protip.js', ['group' => 'footer']); ?>
		<a href="#" id="protip">
			<i class="icon icon-refresh"></i> Tänane nõuanne õppimiseks! &raquo;
		</a>

		<div id="tip"></div>
	</div>
@endsection