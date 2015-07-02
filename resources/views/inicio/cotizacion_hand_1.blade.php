@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')
		<script type="text/javascript">
					$(document).ready(function(){
					    	$("#side2").removeClass("efecto");
					    	$("#5").addClass("oscuro");
					    		    		        
					    });
		</script>

	<div class="large-12 columns" >
		<h3>Nueva Cotización</h3>
	</div>
	<div class="large-12 columns">
		<h7 class="titulo_rojo">Por favor seleccionar el proyecto al que desea agregar una nueva cotización:</h7>
	</div>
	
	<div class="large-5 columns form_loco">
	{!! Form::open(array('url' => 'nuevo_coti', 'method' => 'get')) !!}
	
		{{--{!! Form::open(array('url' => 'foo/bar')) !!}--}}
		{{--{!! Form::select('size', array('L' => 'Large', 'S' => 'Small')) !!}--}}

		{!! Form::select('size',$datos) !!}

		@if ( !empty($datos) )
			{!! Form::submit('Cotizar') !!}
		@endif

	{!! Form::close() !!}
	</div>

@endsection
