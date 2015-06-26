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

	
			<div class="large-12 columns" style="font-weight: bold !important;">
				<h3>Cotizacion</h3>
			</div>
			<div class="large-4 columns" style="font-weight: bold !important;">
				<h7><strong>Seleccione una categoria: </strong></h7>
			</div>

			{!! Form::open(array('url' => 'nuevo_coti', 'method' => 'get')) !!}
			
				{{--{!! Form::open(array('url' => 'foo/bar')) !!}--}}
				{{--{!! Form::select('size', array('L' => 'Large', 'S' => 'Small')) !!}--}}

				{!! Form::select('size',$datos) !!}

				{!! Form::submit('Cotizar') !!}

			{!! Form::close() !!}


			


	</div>

	
@endsection
