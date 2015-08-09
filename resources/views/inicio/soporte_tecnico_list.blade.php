@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')
	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#8").addClass("oscuro");
		});
	</script>

	<div class="large-12 columns" style="font-weight: bold !important;"><h3>Soportes</h3></div>
		@if ( Session::has('message'))
			<p class="alert alert-success">{{ Session::get('message') }}</p>
		@endif
	<div class="large-12 columns prueba">

		<!--p>Hay {{ $datos->lastPage() }} pagina(s)</p-->
		<!--p>Hay {{ $datos->total() }} registro(s)</p-->
		<br>

		<table cellspacing="0">

			<tr class="encabezado">
				<th><h6>N°</h6></th>
				<th><h6>N° Ticket</h6></th>
				<th><h6>N° Factura</h6></th>
				<th><h6>Proveedor</h6></th>
				<th><h6>Acciones</h6></th>
			</tr>
			<!--{{ $i=0 }}-->
			@foreach ($datos as $dato)
			<tr>
				<!--td>{{ $dato->id }}</td-->
				<td>{{ $i = $i + 1 }}</td>
				<td>{{ $dato->nro_ticket }}</td>
				<td>{{ $dato->nro_factura }}</td>
				<td>{{ $dato->proveedor }}</td>
				<td>
					<a href="{{ route('soporte_tecnico.detalle', $dato->id) }}">Ver</a>
				</td>
			</tr>
			@endforeach

		</table>
		{!! $datos->render() !!}

		<a href="{{ url('/soporte_tecnico') }}" class="button large btn_crear" id="buttona" >Enviar Nuevo Ticket</a>

	</div>
	
@endsection