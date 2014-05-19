@extends('baselayout')

@section('content')
	
	<h2>Ülesanded</h2>
	@if($result)
		<?php
			if ($result == 'korras')
				echo '<div class="uk-alert uk-alert-success">Kõik oli õige, tubli!</div>';
			else {
				echo '<div class="uk-alert uk-alert-danger">Kahjuks polnud vastus õige küsimuste puhul nr: ';
				for ($i = 0; $i < count($result); $i++) {
					if ($i == count($result)-1)
						echo $result[$i].'. <br>Proovi uuesti!</div>';
					else
						echo $result[$i].', ';
				}
			}
		?>
	@endif

	<p>
	<?php 
	//echo print_r($tasks); 
	//echo print_r($teema); 
	?>
	</p>

	<form class="uk-panel uk-panel-box uk-form" method="post" action="/teemad/{{$teema}}/ylesanded">

		<?php 
			//foreach ($tasks as $task)
			for ($i = 0; $i < count($tasks); $i++) 
			{
				//echo $tasks[$i]->kirjeldus;
				echo '<label class="uk-form-label" for="answers['.$i.']">Küsimus '.($i+1).': '.$tasks[$i]->kirjeldus.'</label>';
				echo '<div class="uk-form-row">
					<input type="hidden" name="taskIds[]" value="'.$tasks[$i]->id.'" />
					<input name="answers[]" class="uk-width-1-1 uk-form-large" type="text" placeholder="Vastus" required />
					</div><br>';
				
			}
		?>
		
		
		
		<div>
			<input class="uk-width-1-3 uk-button uk-button-primary uk-button-small" type="submit" value="Vasta" />
		</div>
	</form>


@endsection