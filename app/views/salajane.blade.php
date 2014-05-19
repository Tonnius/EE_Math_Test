@extends('baselayout')

@section('breadcrumb')
<ul class="uk-breadcrumb">
	<li><a href="/">Avaleht</a></li>
	<li class="uk-active"><span>Profiil</span></li>
</ul>
@endsection

@section('content')
	<h1>Profiil</h1>

	<div class="uk-width-medium-3-4 uk-container-left">
		<ul class="uk-tab" data-uk-tab="{connect:'#login-options'}">
			<li class="uk-active"><a href="">Progress</a></li>
			<li><a href="">Kasutaja Info</a></li>
			<li><a href="">Testide ajalugu</a></li>
		</ul>

		<ul id="login-options" class="uk-switcher uk-margin">
			<li class="uk-active">
				<?php
					$tasks = DB::table('tasks')->get();
					$success = 0;
					foreach($results as $x => $x_value)
					{
						if($x_value->pakutud_vastus == $tasks[0]->korrektne_vastus) {
							$success++;
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
						<dd>{{Auth::user()->username}}</dd>
						<dt>E-mail:</dt>
						<dd>{{Auth::user()->email}}</dd>
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
