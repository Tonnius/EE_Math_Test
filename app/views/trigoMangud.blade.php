@extends('baselayout')

@section('breadcrumb')
<ul class="uk-breadcrumb">
	<li><a href="/">Avaleht</a></li>
	<li><span>Teemad</span></li>
	<li><span><a href="/teemad/Trigonomeetria">Trigonomeetria</a></span></li>
	<li class="uk-active"><span>Mängud ja abistavad visualiseeringud</span></li>
</ul>
@endsection

@section('content')
	
	<h1>Mängud ja abistavad visualiseeringud</h1>
	<p>Mäng aitab mõista kolmnurga siseringjoone teket ning selle raadiuse arvutamist.</p>
	<div class="videoWrapper"><div id="triangleincircle"></div></div>

	<?php 
	AssetProcessor::cdn('swfobject', '//ajax.googleapis.com/ajax/libs/swfobject/2.2/swfobject.js');
	AssetProcessor::add('triangleincircle_js', '../app/assets/js/triangleincircle.js', ['group' => 'footer']);

	 ?>

	<h2>Siseringjoone arvutusvalem</h2>

	<b>Raadius</b> = <img src="http://www.mathopenref.com/images/equations/triangleincenterradius.gif" alt="">, kus <b>a</b> on kolmnurga pindala. <br />
	<p>Üleval paiknevas näites teame me juba kõikide kolmnurga külgede pikkusi, seega kasutame Heroni valemit (vt <a href="/teemad/Trigonomeetria/trigoMaterjalid">Tekstilised materjalid</a>).</p>
	<p><b>p</b> on kolmnurga ümbermõõt ehk kõikide külgede summa.</p>
	<p>Allikas: <a href="http://www.mathopenref.com/triangleincircle.html">www.mathopenref.com</a></p>
@endsection