@extends('baselayout')

@section('breadcrumb')
<ul class="uk-breadcrumb">
	<li><a href="/">Avaleht</a></li>
	<li><span>Teemad</span></li>
	<li><span><a href="/teemad/{{rawurlencode($teema->name)}}">{{$teema->name}}</a></span></li>
	<li class="uk-active"><span>Ülesanded</span></li>
</ul>
@endsection

@section('content')
	
@if(count($tasks)==0)	
	<h2>Ülesandeid pole veel lisatud</h2>
@else
	<h2>Ülesanded</h2>
	@if($result)
		<?php
			if ($result == 'korras')
				echo '<div class="uk-alert uk-alert-success">Kõik oli õige, tubli!</div>';
			else
			{
				echo '<div class="uk-alert uk-alert-danger">Kahjuks polnud vastus õige küsimuste puhul nr: ';
				for ($i = 0, $c = count($result); $i < $c; ++$i)
				{
					if ($i == $c-1)
						echo $result[$i].'. <br>Proovi uuesti!</div>';
					else
						echo $result[$i].', ';
				}
			}
		?>
	@endif

	<form class="uk-panel uk-panel-box uk-form" method="post" action="/teemad/{{rawurlencode($teema->name)}}/ylesanded">
		@for ($i = 0, $c = count($tasks); $i < $c; ++$i) 
			<div class="uk-form-row">
				<label class="uk-form-label" for="answer_{{$i}}">
					Küsimus {{$i+1}}: {{$tasks[$i]->kirjeldus}}
					@if($tasks[$i]->pilt)
					<img src="/uploads/images/{{$tasks[$i]->pilt}}" alt="Ülesanne" />
					@endif
				</label>
				<input type="hidden" name="taskIds[]" value="{{$tasks[$i]->id}}" />
				<input id="answer_{{$i}}" name="answers[]" class="uk-width-1-1 uk-form-large" type="text" placeholder="Vastus" required="required" />
			</div>
		@endfor

		<div class="uk-form-row">
			<input class="uk-width-1-3 uk-button uk-button-primary uk-button-small" type="submit" value="Vasta" />
		</div>
	</form>
@endif

@endsection