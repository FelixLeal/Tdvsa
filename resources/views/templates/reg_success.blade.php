@extends('layouts.register')

@section('titleRegister')
	Registro Exitoso | Mobotix
@endsection

@section('contentRegister')

	<div class="row" style="margin-top: 15px;">

		<div class="small-11 large-6 large-centered columns hide-for-small-only" > 

			<div class="row" style="margin-top: 20%;">

				<div id="leyenda_2" style="font-size: 18px;">

					<h3 style="font-weight: bold; color: #264A96;">Gracias!</h3>
					Hemos recibido tus datos, estaremos verificando<br>
					la veracidad de tus datos y nos pondremos en contacto<br>
					en la brevedad posible.<br><br>

				</div>

			</div>

			<a href="{{ url('/auth/logout') }}" id="buttona"class="button large" style="text-transform: uppercase;">Aceptar</a>

		</div>

	</div>

@endsection