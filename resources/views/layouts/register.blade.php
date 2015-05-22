<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> @yield('titleRegister', 'Mobotix') </title>
		
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
		<link rel="stylesheet" href="{{ asset('/css/foundation.css') }}"/>
		<link rel="stylesheet" href="{{ asset('/css/principal.css') }}"/>

		<!-- Scripts -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
	</head>
	<body>

		<div class="row" id="principal"> 
			<div class="row">
				<div class="small-3 small-centered columns">
					<!--img  id ="imagen2" src="img/logo-tdvsa-med2.png"-->
					<img  id ="imagen2" src="{{ asset('/img/logo-tdvsa-med2.png') }}">
				</div>
			</div>

			@yield('contentRegister')

		</div>

	</body>
</html>




    

    