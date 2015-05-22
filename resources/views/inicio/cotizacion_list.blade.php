@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')

	<div class="row" style="margin-top: 15px;">

		<div class="small-11 large-6 large-centered columns hide-for-small-only" > 

			<div class="row" style="margin-top: 20%;">

				<div id="leyenda_2" style="font-size: 18px;">

					<h3 style="font-weight: bold; color: #264A96;">Cotizacion List!</h3>
					Estas en la ventana principal de nuestra pagina,<br>
					en donde podras realizar operaciones sencillas<br>
					sobre tu perfil, gestionar proyectos y<br>
					gestionar cotizaciones.<br>
					<br><br>

				</div>

			</div>

			<!--a href="{{ url('/auth/logout') }}" id="buttona"class="button large" style="text-transform: uppercase;">Aceptar</a-->

		</div>

	</div>
	
@endsection