@extends('baselayout')

@section('content')
	<h1>{{$teema->name}}</h1>

	<a href="/teemad/{{$teema->name}}/ylesanded">Ülesanded</a>
@endsection