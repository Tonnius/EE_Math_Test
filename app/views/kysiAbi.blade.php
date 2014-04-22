@extends('baselayout')

@section('content')	
	<h1>Küsi abi</h1>

<?php /*
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
	</script>--> */ ?>
	<?php
		AssetProcessor::cdn('chatapp_css', 'http://mychatappmathtest.cloudapp.net/stylesheets/style.css');
		AssetProcessor::cdn('socketio_js', 'http://mychatappmathtest.cloudapp.net/socket.io/socket.io.js');
		AssetProcessor::add('chatapp_js', '../app/assets/js/chatapp.js', ['group' => 'footer']);
	?>

	<div id="chat">
		<div id="nickname">
			<form id="set-nickname" class="wrap">
				<p>Palun sisesta oma hüüdnimi ja vajuta 'enter' klahvi.</p>
				<input id="nick" />
				<p id="nickname-err">Hüüdnimi juba kasutusel</p>
			</form>
		</div>

		<div id="connecting">
			<div class="wrap">Ühendun serveriga</div>
		</div>

		<div id="messages">
			<div id="nicknames"></div>
			<div id="lines"></div>
		</div>

		<form id="send-message">
			<input id="message" />
			<button>Saada</button>
		</form>
	</div>
	
@endsection