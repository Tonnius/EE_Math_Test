@extends('baselayout')

@section('content')
	@if(Session::has('csrf_error'))
	<div class="uk-alert uk-alert-danger">{{Session::get('csrf_error')}}</div>
	@endif

	@if(Session::has('logout_message'))
	<div class="uk-alert uk-alert-success">{{Session::get('logout_message')}}</div>
	@endif
	<p>Oled jõudnud esialgsele ee_math_test leheküljele.</p>
	
	<p>Peatselt tekivad siia esmased leheküljed</p>

	<div class="container">

		<?php AssetProcessor::add('protip', '../app/assets/js/protip.js', ['group' => 'footer']); ?>
		<a href="#" id="protip">
			<i class="icon icon-refresh"></i> Tänane nõuanne õppimiseks! &raquo;
		</a>

		<div id="tip"></div>
	</div>
@endsection