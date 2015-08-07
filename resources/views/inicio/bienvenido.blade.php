@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')

	<div class="small-11 large-6 large-centered columns"> 

		<div class="row" style="margin-top: 20%;">

			<div id="leyenda_2" style="font-size: 18px;">
				<h3 style="font-weight: bold; color: #264A96;">Bienvenido {{ Auth::user()->name }} </h3>
				<p>
					Estás en la ventana principal de nuestra pagina, en donde podras realizar operaciones sencillas sobre tu perfil, gestionar proyectos y gestionar cotizaciones.
				</p>
			</div>
			<br><br>
		</div>

	</div>
	
@endsection