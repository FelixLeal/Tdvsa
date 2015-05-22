@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')

	<!--div class="row" style="margin-top: 15px;">

		<div class="large-8 columns" id="panel_central" style="padding-top: 30px;">

			<div class="row panel" style="font-weight: bold; background-color: #ffffff; ">

				<div class="large-12 columns" style="font-weight: bold !important;"><h3>Nuevo Proyecto</h3></div-->

	
		<div class="row panel" style="font-weight: bold; background-color: #ffffff;">
			<div class="large-12 columns" style="font-weight: bold !important;"><h3>Proyectos</h3></div>
			<div class="large-12 columns prueba">

				{!! Form::open( ['route' => 'inte.proyecto.store', 'id' => 'form_2', 'class' => 'small-10 large-4 columns'] ) !!}

					@include('inicio.partials.formProyecto')

					<button type="submit" id="buttona" class="button large" style="text-transform: uppercase;">Crear</button>

				{!! Form::close() !!}

			</div>

		</div>

	
	
@endsection