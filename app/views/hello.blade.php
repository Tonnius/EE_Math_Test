@extends('baselayout')

@section('content')
	@if(Session::has('csrf_error'))
	<div class="uk-alert uk-alert-danger">{{Session::get('csrf_error')}}</div>
	@endif

	@if(Session::has('logout_message'))
	<div class="uk-alert uk-alert-success">{{Session::get('logout_message')}}</div>
	@endif
	<p>Oled jõudnud esialgsele ee_math_test leheküljele.</p>
	
	<p>Peatselt tekivad siia esmased leheküljed</p>
	<script src='//code.jquery.com/jquery-1.7.2.min.js'></script>
	<script src="http://localhost:49199/socket.io/socket.io.js"></script>
	<script>
	  var socket = io.connect('http://localhost:49199');
			socket.on('news', function (data) {
	    console.log(data);
	    socket.emit('my other event', { my: 'data' });
	    $('#messages').append('<li>' + data.hello + '</li>');
	  });
	                

	                

	</script>
	<body>
	        <ul id='messages'></ul>
	    </body>
@endsection