@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')

	<div class="row panel" style="font-weight: bold; background-color: #ffffff;">
		<div class="large-12 columns" style="font-weight: bold !important;"><h3>Proyectos</h3></div>
		<div class="large-12 columns prueba">

			{!! Form::open( ['route' => 'inte.proyecto.store', 'id' => 'form_2', 'class' => 'small-10 large-4 columns'] ) !!}

				@include('inicio.partials.formProyecto')

				<button type="submit" id="buttona" class="button large" style="text-transform: uppercase;">Crear</button>

<<<<<<< HEAD
	
		<div class="row panel" style="font-weight: bold; background-color: #ffffff;">
			<div class="large-12 columns" style="font-weight: bold !important;"><h3>Proyectos</h3></div>
			<div class="large-12 columns prueba">

				{!! Form::open( ['route' => 'inte.proyecto.store', 'id' => 'form_2', 'class' => 'small-10 large-4 columns'] ) !!}

					@include('inicio.partials.formProyecto')

					<button type="submit" id="buttona" class="button large" style="text-transform: uppercase;">Crear</button>

				{!! Form::close() !!}

			</div>

		</div>

	
	
=======
			{!! Form::close() !!}

		</div>

	</div>

>>>>>>> 576b1f80d672f33d83131b6828dd3d79c532b0e5
@endsection