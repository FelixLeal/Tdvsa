@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')

	<div class="small-11 large-6 large-centered columns hide-for-small-only" > 

		<div class="row" style="margin-top: 20%;">

			<div id="leyenda_2" style="font-size: 18px;">
				<h3 style="font-weight: bold; color: #264A96;">Bienvenido {{ Auth::user()->name }} </h3>
				<p>
					Estas en la ventana principal de nuestra pagina, en donde podras realizar operaciones sencillas sobre tu perfil, gestionar proyectos y gestionar cotizaciones.
				</p>
			</div>
			<br><br>
		</div>

		<!--a href="{{ url('/auth/logout') }}" id="buttona"class="button large" style="text-transform: uppercase;">Aceptar</a-->

	</div>
	
@endsection