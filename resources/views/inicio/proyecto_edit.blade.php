@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')
	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#side2").removeClass("efecto");		    		    		        
		});
	</script>

	<div class="large-12 columns" style="font-weight: bold !important;"><h3>Editar Proyecto: {{ $datos->nombre }}</h3></div>
	<div class="large-12 columns prueba">

		@if ( Session::has('message'))
			<p class="alert alert-success">{{ Session::get('message') }}</p>
		@endif

		{!! Form::model( $datos, ['route' => ['inte.proyecto.update', $datos->id], 'method' => 'PUT', 'id' => 'form_2', 'class' => 'small-10 large-4 columns'] ) !!}
			@include('inicio.partials.formProyecto')
			<button type="submit" id="buttona" class="button large" style="text-transform: uppercase;">Guardar cambios</button>
		{!! Form::close() !!}
	</div>
	
@endsection