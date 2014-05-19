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

	<a href="/teemad/{{urlencode($teema->name)}}/ylesanded">Ülesanded</a>
@endsection