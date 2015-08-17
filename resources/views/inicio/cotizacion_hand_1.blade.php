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

	<div class="large-12 columns" style="font-weight: bold !important;">
		<h3>Cotización</h3>
	</div>
	<div class="large-6 columns" style="font-weight: bold !important;">
		<h7><strong>Seleccione un proyecto: </strong></h7>
	</div>

	{!! Form::open(array('url' => 'nuevo_coti', 'method' => 'get')) !!}
	
		{{--{!! Form::open(array('url' => 'foo/bar')) !!}--}}
		{{--{!! Form::select('size', array('L' => 'Large', 'S' => 'Small')) !!}--}}

		{!! Form::select('size',$datos) !!}

		@if ( !empty($datos) )
			<button type="submit" id="buttona" class="button large" style="text-transform: uppercase;">Cotizar</button>
		@endif

	{!! Form::close() !!}

@endsection
