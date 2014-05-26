@extends('baselayout')

@section('breadcrumb')
<ul class="uk-breadcrumb">
	<li><a href="/">Avaleht</a></li>
	<li class="uk-active"><span>Kontakt</span></li>
</ul>
@endsection


@section('content')	
	<h1>Kontaktandmed</h1>
	
	<div class="uk-panel uk-panel-box uk-panel-box-secondary">
 	<h3>Administraatori kontaktinfo:</h3>
 		<dl class="uk-description-list uk-description-list-horizontal">
 			<dt>Pilt:</dt>
 			<dd><img src="http://starcraft2.ingame.de/wiki/images/6/66/Char_raynor.png" alt="Jim Raynor" /></dd>
 			<dt>Nimi:</dt>
 			<dd>Jim Raynor</dd>
 			<dt>Aadress:</dt>
 			<dd>Hyperion Battlecruiser, somwhere near Korhal, Dominion Space</dd>
 			<dt>Postiindeks:</dt>
 			<dd>54A DEADZERG</dd>
 			<dt>Telefon:</dt>
 			<dd>0-800-YIPPIE-KI-YAY</dd>
 			<dt>E-post:</dt>
 			<dd>timeToManUp@gmail.com</dd>
 		</dl>
 	</div>
@endsection