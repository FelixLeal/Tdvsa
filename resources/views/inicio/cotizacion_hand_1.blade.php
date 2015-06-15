@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')

		<div class="row panel" style="font-weight: bold; background-color: #ffffff;">
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
