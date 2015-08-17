@extends('layouts.admin')

@section('titleInicioAdmin')
	Bienvenido | Mobotix
@endsection

@section('contentInicioAdmin')
	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#side2").removeClass("efecto");		    		    		        
		});
	</script>

	<div class="large-12 columns" style="font-weight: bold !important;"><h3>Detalles de la Empresa: {{ $datos->razon_social }}</h3></div>
	<div class="large-12 columns prueba">

		@if ( Session::has('message'))
			<p class="alert alert-success">{{ Session::get('message') }}</p>
		@endif

		{!! Form::model( $datos, ['route' => ['inte.proyecto.update', $datos->id], 'method' => 'PUT', 'id' => 'form_2', 'class' => 'small-10 large-4 columns'] ) !!}
			@include('admin.partials.formEmpresa')
			
			@if ( $datos->codigo_afiliacion == 0 )
				<a id="buttona" class="button large" href="{{ route('empresas.afiliar', $datos->id) }}">Afiliar</a>
			@endif
		{!! Form::close() !!}

	</div>
	
@endsection