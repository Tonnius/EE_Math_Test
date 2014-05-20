@section('navitems')
	<li @if (Request::is('/')) class="uk-active" @endif><a href="/">Avaleht</a></li>
	<li @if (Request::is('eksamist')) class="uk-active" @endif><a href="/eksamist">Eksamist</a></li>

	<li class="uk-parent @if (Request::is('teemad/*')) uk-active @endif">
		<a href="#">Teemad</a>
		<!-- Mhm, ma tean et need on kitsa eksami teemad -->
		<ul class="uk-nav-sub">
			<li><a href="/teemad/{{urlencode('Arvuhulgad')}}">1. Arvuhulgad</a>
				<ul>
					<li><a href="/teemad/{{urlencode('Avaldised')}}">Avaldised</a></li>
					<li><a href="/teemad/{{urlencode('Võrrandid ja võrratused')}}">Võrrandid ja võrratused</a></li>
				</ul>
			</li>
			<li><a href="/teemad/{{urlencode('Trigonomeetria')}}">2. Trigonomeetria</a></li>
			<li><a href="/teemad/{{urlencode('Vektor tasandil')}}">3. Vektor tasandil</a>
				<ul>
					<li><a href="/teemad/{{urlencode('Joone võrrand')}}">Joone võrrand</a></li>
				</ul>
			</li>
			<li><a href="/teemad/{{urlencode('Tõenäosus ja statistika')}}">4. Tõenäosus ja statistika</a></li>
			<li><a href="/teemad/{{urlencode('Funktsioonid I')}}">5. Funktsioonid I</a></li>
			<li><a href="/teemad/{{urlencode('Funktsioonid II')}}">6. Funktsioonid II</a></li>
			<li><a href="/teemad/{{urlencode('Tasandilised kujundid')}}">7. Tasandilised kujundid</a>
				<ul>
					<li><a href="/teemad/{{urlencode('Integraal')}}">Integraal</a></li>
				</ul>
			</li>
			<li><a href="/teemad/{{urlencode('Stereomeetria')}}">8. Stereomeetria</a></li>
		</ul>
	</li>

	<li><a href="/kuidasOppida">Kuidas õppida</a></li>
	<li @if (Request::is('kysiAbi')) class="uk-active" @endif><a href="/kysiAbi">Küsi abi</a></li>

	<li class="uk-nav-divider"></li>
	<li><a href="/kontakt">Kontakt</a></li>

	@if(Auth::check() && Auth::user()->is_admin())
	<li class="uk-nav-divider"></li>
	<li class="uk-nav-header">Administraator</li>

	<li @if (Request::is('lisaYl')) class="uk-active" @endif><a href="/lisaYl">Lisa ülesanne</a></li>
	<li @if (Request::is('opil*')) class="uk-active" @endif><a href="/opil">Kasutajad</a></li>
	@endif

@endsection

<!doctype html>
<html lang="et">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>EE Math test</title>
	{{ AssetProcessor::styles() }}
	{{ AssetProcessor::scripts('header') }}
</head>
<body>
	<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
		<nav class="uk-navbar uk-margin-large-bottom uk-visible-small">
			<a href="#offcanvas" class="uk-navbar-toggle" data-uk-offcanvas></a>
			<div class="uk-navbar-brand uk-navbar-center">EE Math test</div>
		</nav>

		<div class="uk-grid">
			<div class="uk-width-1-1">
				<div class="uk-width-1-1 uk-hidden-small" id="header_logo">
					@if(Auth::check())
					<div id="header_avatar">
						@if(Auth::user()->is_admin())
							<img class="uk-border-rounded" src="/assets/avatars/king_brick.png" width="125" height="125" alt="Avatar" />
						@else
							<img class="uk-border-rounded" src="/assets/avatars/normal_brick.png" width="125" height="125" alt="Avatar" />
						@endif
					</div>
					@endif
				</div>

				<ul class="uk-grid" data-uk-grid-match="{target:'.uk-panel', row: true}">
				    <li class="uk-width-medium-1-2 uk-hidden-small">
						@yield('breadcrumb', '&nbsp;')
				    </li>
				    <li class="uk-width-medium-1-2 uk-text-right">
					@if(Auth::check())
						Tere, {{Auth::user()->username}}! | <a href="/profiil">Profiil</a> | <a href="/logout?_token={{csrf_token();}}">Logi välja</a>
					@else
						Tere, külaline! | <a href="/login">Logi sisse</a> | <a href="/signup">Registreeru</a>
					@endif
				    </li>
				</ul>

				<div class="uk-grid">
					<div class="uk-width-1-5 uk-hidden-small">
						<ul class="uk-nav uk-nav-side uk-nav-parent-icon" data-uk-nav>
							@yield('navitems')
						</ul>
					</div>

					<div class="uk-width-1-1 uk-width-medium-4-5">
						@yield('content')
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- See menüü kordub sellega, mis on küljeribal. Küll ma midagi välja mõtlen et seda kordust ära kaotada. -->
	<div id="offcanvas" class="uk-offcanvas">
		<div class="uk-offcanvas-bar">
			<ul class="uk-nav uk-nav-offcanvas" data-uk-nav>
				@yield('navitems')
			</ul>
		</div>
	</div>
	{{ AssetProcessor::scripts('cdn') }}
	{{ AssetProcessor::scripts('footer') }}
</body>
</html>
