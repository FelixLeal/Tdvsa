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

	<div class="large-12 columns" style="font-weight: bold !important;"><h3>Editar Producto</h3></div>
	<div class="large-12 columns prueba">

		@if ( Session::has('message'))
			<p class="alert alert-success">{{ Session::get('message') }}</p>
		@endif

		{!! Form::model( $datos, ['route' => ['detalle_coti.detalle.modificar.update', $datos->id], 'method' => 'POST', 'id' => 'form_2', 'class' => 'small-10 large-4 columns'] ) !!}
			@include('inicio.partials.formProducto')
			<button type="submit" id="buttona" class="button large" style="text-transform: uppercase;">Editar</button>
		{!! Form::close() !!}
	</div>
	
@endsection