@extends('baselayout')

@section('breadcrumb')
<ul class="uk-breadcrumb">
	<li><a href="/">Avaleht</a></li>
	<li><span>Teemad</span></li>
	<li class="uk-active"><span>{{$teema->name}}</span></li>
</ul>
@endsection

@section('content')
	<h1>{{$teema->name}}</h1>
	@if($teema->name == 'Trigonomeetria')
		<h3><a href="/teemad/{{urlencode($teema->name)}}/trigoMaterjalid">Tekstilised materjalid</a></h3>
		<h3><a href="/teemad/{{urlencode($teema->name)}}/trigoVideoMaterjalid">Videomaterjalid</a></h3>
		<h3><a href="/teemad/{{urlencode($teema->name)}}/trigoMangud">Mängud ja abistavad visualiseeringud</a></h3>
	@endif
	<h3><a href="/teemad/{{urlencode($teema->name)}}/ylesanded">Ülesanded</a></h3>
	
@endsection