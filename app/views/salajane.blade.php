@extends('baselayout')

@section('content')
	<h1>Profiil</h1>


			<div class="uk-width-medium-3-4 uk-container-left">
			<ul class="uk-tab" data-uk-tab="{connect:'#login-options'}">
				<li class="uk-active"><a href="">Progress</a></li>
				<li><a href=""></i>Kasutaja Info</a></li>
				<li><a href=""></i>Testide ajalugu</a></li>
			</ul>

				

				<ul id="login-options" class="uk-switcher uk-margin">
					<li class="uk-active">
						<?php
							$tasksCount = DB::table('tasks')->count();
							$counter = 0;
							foreach($results as $x=>$x_value)
							{
								if($x_value->pakutud_vastus == $x_value->korrektne_vastus) {
									$counter++;
								}
							}

							$counter=$counter/$tasksCount*100;
							if ($counter > 100) {
								$counter = 100;
							}
						?>
						<div class="uk-panel uk-panel-box uk-panel-box-secondary">
							<div class="uk-animation-slide-bottom">
								<div class="uk-progress">
									<div class="uk-progress-bar" style="width: <?php echo $counter; ?>%">{{$counter}}%</div>
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
					<li class="uk-active">
						
						<div class="uk-panel uk-panel-box uk-panel-box-secondary">
							<?php
								foreach($results as $x=>$x_value)
							  {
							  echo "Test nr:" . ($x+1) . " (sooritatud: ".$x_value->created_at . ") <br>";
							  echo "Ülesanne nr: " . $x_value->task_id. " <br>";
							  echo "Sinu vastus: " . $x_value->pakutud_vastus. " <br>";
							  echo "<br>";
							  }
							  ?>
							
						</div>

					</li>
				</ul>
			</div>
@endsection