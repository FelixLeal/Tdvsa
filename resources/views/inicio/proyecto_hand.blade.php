@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')

	<script type="text/javascript">
		$(document).ready(function(){
			$("#side2").removeClass("efecto");
			$("#3").addClass("oscuro");
		});
	</script>

	<div class="large-12 columns" style=""><h3>Nuevo Proyecto</h3></div>
	<div class="large-12 columns prueba">
		{!! Form::open( ['route' => 'inte.proyecto.store', 'id' => 'form_2', 'class' => 'small-10 large-4 columns'] ) !!}
			@include('inicio.partials.formProyecto')
			<button type="submit" id="buttona" class="button large" style="text-transform: uppercase;">Solicitar Proyecto</button>
		{!! Form::close() !!}
	</div>

@endsection