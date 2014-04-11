@extends('baselayout')

@section('content')
	<h1>Profiil</h1>


			<div class="uk-width-medium-3-4 uk-container-left">
			<ul class="uk-tab" data-uk-tab="{connect:'#login-options'}">
				<li class="uk-active"><a href="">Progress</a></li>
				<li><a href=""></i>Kasutaja Info</a></li>
			</ul>

				

				<ul id="login-options" class="uk-switcher uk-margin">
					<li class="uk-active">
						
						<div class="uk-panel uk-panel-box uk-panel-box-secondary">
							<div class="uk-animation-slide-bottom">
								<div class="uk-progress">
									<div class="uk-progress-bar" style="width: 80%;">80%</div>
								</div>
							</div>
						</div>

					</li>
					<li class="uk-active">
						<div class="uk-panel uk-panel-box uk-panel-box-secondary">
							<dl class="uk-description-list uk-description-list-horizontal">
								<dt>Kasutajanimi:</dt>
								<dd>{{Auth::user()->username}}</dd>
								<dt>E-mail:</dt>
								<dd>{{Auth::user()->email}}</dd>
							</dl>
							
						</div>
					</li>
				</ul>
			</div>
@endsection