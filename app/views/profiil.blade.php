@extends('baselayout')

@section('breadcrumb')
<ul class="uk-breadcrumb">
	<li><a href="/">Avaleht</a></li>
	<li class="uk-active"><span>Profiil</span></li>
</ul>
@endsection

@section('content')
	<h1>{{$user->username}}</h1>

	<div class="uk-width-medium-1-1 uk-container-left">
		<ul class="uk-tab" data-uk-tab="{connect:'#login-options'}">
			<li id="progress" class="uk-active"><a href="#progress">Progress</a></li>
			<li id="info"><a href="#info">Kasutaja Info</a></li>
			<li id="history"><a href="#tere">Testide ajalugu</a></li>
		</ul>

		<ul id="login-options" class="uk-switcher uk-margin">
			<li class="uk-active">
				<?php
					$tasks = DB::table('tasks')->get();
					$success = 0;
					foreach($results as $x => $x_value)
					{
						if($x_value->pakutud_vastus == $tasks[0]->korrektne_vastus) {
							++$success;
						}
					}

					if($count != null)
					{
						$progress=intval($success/($count[0]->NumberOfTestsDone)*100);
						if ($progress > 100) {
							$progress = 100;
						}
					} else {
						$progress = 0;
					}
					//print_r($tasks);
					
				?>
				<div class="uk-panel uk-panel-box uk-panel-box-secondary">
					<div class="uk-animation-slide-bottom">
						<div class="uk-progress">
							<div class="uk-progress-bar" style="width: {{$progress}}%">{{$progress}}%</div>
						</div>
					</div>
					<p>Teste tehtud: <?php echo ($count != null ? $count[0]->NumberOfTestsDone : $progress); ?></p>
					<p>Testid edukalt läbitud: {{$success}}</p>
				</div>
			</li>
			<li class="uk-active">
				<div class="uk-panel uk-panel-box uk-panel-box-secondary">
					<dl class="uk-description-list uk-description-list-horizontal">
						<dt>Kasutajanimi:</dt>
						<dd>{{$user->username}}</dd>
						<dt>E-mail:</dt>
						<dd>{{$user->email}}</dd>
					</dl>
					
				</div>
			</li>
			<li class="uk-active">
				
				<div class="uk-panel uk-panel-box uk-panel-box-secondary">
					<?php
						foreach($results as $x => $x_value)
						{
							echo 'Test nr: ' . ($x+1) . ' (sooritatud: '.$x_value->created_at . ')<br />';
							echo 'Ülesanne nr: ' . $x_value->task_id. '<br />';
							echo 'Sinu vastus: ' . $x_value->pakutud_vastus. '<br />';
							echo '<br />';
						}
					?>
				</div>
			</li>
		</ul>
	</div>
@endsection
