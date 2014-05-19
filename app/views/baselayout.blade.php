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
			<div class="uk-width-1-5 uk-hidden-small">
				<div class="uk-width-1-1 uk-text-center uk-margin-bottom">
				@if(Auth::check())
					<img src="http://placekitten.com/125/125" width="125" height="125" alt="Avatar" /><br />	
					<span>
						Tere, {{Auth::user()->username}}!<br />
						<a href="/secret">Profiil</a> | <a href="/logout?_token={{csrf_token();}}">Logi välja</a>
					</span>
				@else
					<span>
						Tere, külaline!<br />
						<a href="/login">Logi sisse</a> | <a href="/signup">Registreeru</a>
					</span>
				@endif
				</div>
				
		
				<ul class="uk-nav uk-nav-side uk-nav-parent-icon" data-uk-nav>
					<li @if (Request::is('/')) class="uk-active" @endif><a href="/">Avaleht</a></li>
					<li @if (Request::is('eksamist')) class="uk-active" @endif><a href="/eksamist">Eksamist</a></li>

					<li class="uk-parent">
						<a href="#">Teemad</a>
						<!-- Mhm, ma tean et need on kitsa eksami teemad -->
						<ul class="uk-nav-sub">
							<li><a href="/teemad/Arvuhulgad">1. Arvuhulgad</a>
								<ul>
									<li><a href="/teemad/Avaldised">Avaldised</a></li>
									<li><a href="/teemad/Võrrandid ja võrratused">Võrrandid ja võrratused</a></li>
								</ul>
							</li>
							<li><a href="/teemad/Trigonomeetria">2. Trigonomeetria</a></li>
							<li><a href="/teemad/Vektor tasandil">3. Vektor tasandil</a>
								<ul>
									<li><a href="/teemad/Joone võrrand">Joone võrrand</a></li>
								</ul>
							</li>
							<li><a href="/teemad/Tõenäosus ja statistika">4. Tõenäosus ja statistika</a></li>
							<li><a href="/teemad/Funktsioonid I">5. Funktsioonid I</a></li>
							<li><a href="/teemad/Funktsioonid II">6. Funktsioonid II</a></li>
							<li><a href="/teemad/Tasandilised kujundid">7. Tasandilised kujundid</a>
								<ul>
									<li><a href="/teemad/">Integraal</a></li>
								</ul>
							</li>
							<li><a href="/teemad/Stereomeetria">8. Stereomeetria</a></li>
						</ul>
					</li>

					<li><a href="#">Kuidas õppida</a></li>
					<li><a href="/kysiAbi">Küsi abi</a></li>

					<li class="uk-nav-divider"></li>
					<li><a href="#">Kontakt</a></li>
					<li><a href="/secret">Salajane leht</a></li>
					<li><a href="/lisaYl">Lisa ülesanne</a></li>
				</ul>
			</div>

			<div class="uk-width-1-1 uk-width-medium-4-5">
				@yield('content')
			</div>
		</div>
	</div>

	<!-- See menüü kordub sellega, mis on küljeribal. Küll ma midagi välja mõtlen et seda kordust ära kaotada. -->
	<div id="offcanvas" class="uk-offcanvas">
		<div class="uk-offcanvas-bar">
			<ul class="uk-nav uk-nav-offcanvas" data-uk-nav>
				<li @if (Request::is('/')) class="uk-active" @endif><a href="/">Avaleht</a></li>
				<li @if (Request::is('eksamist')) class="uk-active" @endif><a href="/eksamist">Eksamist</a></li>

				<li class="uk-parent">
					<a href="#">Teemad</a>
					<!-- Mhm, ma tean et need on kitsa eksami teemad -->
					<ul class="uk-nav-sub">
						<li><a href="#">1. Arvuhulgad</a>
							<ul>
								<li><a href="#">Avaldised</a></li>
								<li><a href="#">Võrrandid &amp; võrratused</a></li>
							</ul>
						</li>
						<li><a href="#">2. Trigonomeetria</a></li>
						<li><a href="#">3. Vektor tasandil</a>
							<ul>
								<li><a href="#">Joone võrrand</a></li>
							</ul>
						</li>
						<li><a href="#">4. Tõenäosus ja statistika</a></li>
						<li><a href="#">5. Funktsioonid I</a></li>
						<li><a href="#">6. Funktsioonid II</a></li>
						<li><a href="#">7. Tasandilised kujundid</a>
							<ul>
								<li><a href="#">Integraal</a></li>
							</ul>
						</li>
						<li><a href="#">8. Stereomeetria</a></li>
					</ul>
				</li>

				<li><a href="#">Kuidas õppida</a></li>
				<li><a href="#">Küsi abi</a></li>

				<li class="uk-nav-divider"></li>
				<li><a href="#">Kontakt</a></li>
			</ul>
		</div>
	</div>
	{{ AssetProcessor::scripts('cdn') }}
	{{ AssetProcessor::scripts('footer') }}
</body>
</html>
