@extends('layouts.admin')

@section('titleInicioAdmin')
	Bienvenido | Mobotix
@endsection

@section('contentInicioAdmin')

	<div class="small-11 large-6 large-centered columns"> 

		<div class="row" style="margin-top: 20%;">

			<div id="leyenda_2" style="font-size: 18px;">
				<h3 style="font-weight: bold; color: #264A96;">Bienvenido {{ Auth::user()->name }} </h3>
				<p>
					Aquí podras administrar proyectos y clientes de cotización
				</p>
			</div>
			<br><br>
		</div>

	</div>
	
@endsection