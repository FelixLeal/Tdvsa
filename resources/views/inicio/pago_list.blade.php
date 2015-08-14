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

	<div class="large-12 columns" style="font-weight: bold !important;"><h3>Pagos</h3></div>
		@if ( Session::has('message'))
			<p class="alert alert-success">{{ Session::get('message') }}</p>
		@endif
	<div class="large-12 columns prueba">

		<!--p>Hay {{ $datos->lastPage() }} pagina(s)</p-->
		<!--p>Hay {{ $datos->total() }} registro(s)</p-->
		<br>

		<table cellspacing="0">

			<tr class="encabezado">
				<th><h6>#</h6></th>
				<th><h6>Nombre</h6></th>
				<th><h6>Monto</h6></th>
				<th><h6>Fecha</h6></th>
				<th><h6>Acciones</h6></th>
			</tr>
			<!--{{ $i=0 }}-->
			@foreach ($datos as $dato)
			<tr>
				<!--td>{{ $dato->id }}</td-->
				<td>{{ $i = $i + 1 }}</td>
				<td>{{ \DB::table('empresas')->where('id', '=', (\DB::table('users')->whereId($dato->id_user)->first()->id_empresa))->first()->razon_social }}</td>
				<td class="monto"><div class="hola">{{ $dato->monto }}</div></td>
				<td>{{ $dato->fecha_transaccion }}</td>
				<td>
					<a href="{{ route('pago.inicio.detalle', $dato->id) }}">Ver</a>
				</td>
			</tr>
			@endforeach

		</table>
		{!! $datos->render() !!}

		<a href="{{ url('/reporte_pago') }}" class="button large btn_crear" id="buttona" >Crear Nuevo Pago</a>

	</div>
	
@endsection