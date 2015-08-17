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

	<div class="large-12 columns" style="font-weight: bold !important;"><h3>Afiliar a la Empresa: {{ $datos->razon_social }}</h3></div>
	<div class="large-12 columns prueba">

		@if ( Session::has('message'))
			<p class="alert alert-success">{{ Session::get('message') }}</p>
		@endif

		{!! Form::model( $datos, ['route' => ['empresas.afiliar.store', $datos->id], 'method' => 'POST', 'id' => 'form_2', 'class' => 'small-10 large-4 columns'] ) !!}
			@include('admin.partials.formEmpresaAfiliar')

			<button type="submit" id="buttona" class="button large" style="text-transform: uppercase;">Afiliar</button>
		{!! Form::close() !!}

	</div>
	
@endsection