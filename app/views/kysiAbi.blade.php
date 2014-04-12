@extends('baselayout')

@section('content')	
	<h1>
		Küsi abi
	</h1>

	<!--@scripts start-->
	<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
	<script src="js/bootstrap.js"></script>
	<script src="js/brain-socket.min.js"></script>
	<script type="text/javascript" charset="utf-8">
		$(function(){

			var fake_user_id = Math.floor((Math.random()*1000)+1);

			//make sure to update the port number if your ws server is running on a different one.
			window.app = {};

			app.BrainSocket = new BrainSocket(
					new WebSocket('ws://localhost:8082'),
					new BrainSocketPubSub()
			);

			app.BrainSocket.Event.listen('generic.event',function(msg){
				console.log(msg);
				if(msg.client.data.user_id == fake_user_id){
					$('#chat-log').append('<div class="alert alert-success">Me: '+msg.client.data.message+'</div>');
				}else{
					$('#chat-log').append('<div class="alert alert-info">Them: '+msg.client.data.message+'</div>');
				}
			});

			app.BrainSocket.Event.listen('app.success',function(data){
				console.log('An app success message was sent from the ws server!');
				console.log(data);
			});

			app.BrainSocket.Event.listen('app.error',function(data){
				console.log('An app error message was sent from the ws server!');
				console.log(data);
			});

			$('#chat-message').keypress(function(event) {

						if(event.keyCode == 13){

							app.BrainSocket.message('generic.event',
									{
										'message':$(this).val(),
										'user_id':fake_user_id
									}
							);
							$(this).val('');

						}

						return event.keyCode != 13; }
			);
		});
	</script>-->
	<link href="http://mychatappmathtest.cloudapp.net/stylesheets/style.css" rel="stylesheet">
	<script src="http://code.jquery.com/jquery-1.6.1.min.js"></script>
	<script src="http://mychatappmathtest.cloudapp.net/socket.io/socket.io.js"></script>
	<script>
	 // socket.io specific code
      var socket = io.connect("http://mychatappmathtest.cloudapp.net");

      socket.on('connect', function () {
        $('#chat').addClass('connected');
      });

      socket.on('announcement', function (msg) {
        $('#lines').append($('<p>').append($('<em>').text(msg)));
      });

      socket.on('nicknames', function (nicknames) {
        $('#nicknames').empty().append($('<span>Online: </span>'));
        for (var i in nicknames) {
          $('#nicknames').append($('<b>').text(nicknames[i]));
        }
      });

      socket.on('user message', message);
      socket.on('reconnect', function () {
        $('#lines').remove();
        message('System', 'Reconnected to the server');
      });

      socket.on('reconnecting', function () {
        message('System', 'Attempting to re-connect to the server');
      });

      socket.on('error', function (e) {
        message('System', e ? e : 'A unknown error occurred');
      });

      function message (from, msg) {
        $('#lines').append($('<p>').append($('<b>').text(from), msg));
      }

      // dom manipulation
      $(function () {
        $('#set-nickname').submit(function (ev) {
          socket.emit('nickname', $('#nick').val(), function (set) {
            if (!set) {
              clear();
              return $('#chat').addClass('nickname-set');
            }
            $('#nickname-err').css('visibility', 'visible');
          });
          return false;
        });

        $('#send-message').submit(function () {
          message('me', $('#message').val());
          socket.emit('user message', $('#message').val());
          clear();
          $('#lines').get(0).scrollTop = 10000000;
          return false;
        });

        function clear () {
          $('#message').val('').focus();
        };
      });     

	                

	</script>
	<div id="chat">
	<div id="nickname">
		<form id="set-nickname" class="wrap">
			<p>Palun sisesta oma hüüdnimi ja vajuta 'enter' klahvi.</p>
			<input id="nick">
			<p id="nickname-err">Hüüdnimi juba kasutusel</p>
		</form>
	</div>
	<div id="connecting">
	<div class="wrap">Ühendun serveriga
	</div>
	</div>
	<div id="messages">
	<div id="nicknames">
		
	</div>
	<div id="lines">
		
	</div>
	</div>
	<form id="send-message">
		<input id="message">
		<button>Saada</button>
	</form>
	</div>
	
@endsection