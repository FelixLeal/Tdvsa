@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')

<<<<<<< HEAD
	
		<div class="row panel" style="font-weight: bold; background-color: #ffffff; padding-top: 30px; height: 1000px;">
			<div class="large-12 columns" style="font-weight: bold !important;"><h3>Editar Proyecto: {{ $datos->nombre }}</h3></div>
			<div class="large-12 columns prueba">
=======
	<div class="row panel" style="font-weight: bold; background-color: #ffffff; padding-top: 30px; height: 1000px;">
 		<div class="large-12 columns" style="font-weight: bold !important;"><h3>Editar Proyecto: {{ $datos->nombre }}</h3></div>
		<div class="large-12 columns prueba">
>>>>>>> 576b1f80d672f33d83131b6828dd3d79c532b0e5

			@if ( Session::has('message'))
				<p class="alert alert-success">{{ Session::get('message') }}</p>
			@endif

			{!! Form::model( $datos, ['route' => ['inte.proyecto.update', $datos->id], 'method' => 'PUT', 'id' => 'form_2', 'class' => 'small-10 large-4 columns'] ) !!}
				@include('inicio.partials.formProyecto')
				<button type="submit" id="buttona" class="button large" style="text-transform: uppercase;">Crear</button>
			{!! Form::close() !!}
		</div>
<<<<<<< HEAD

=======
	</div>
>>>>>>> 2f73615f15df49737d99b8a5325c06df01267db3
	
@endsection