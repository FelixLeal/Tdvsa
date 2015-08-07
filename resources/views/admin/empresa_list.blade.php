@extends('layouts.admin')

@section('titleInicioAdmin')
	Bienvenido | Mobotix
@endsection

@section('contentInicioAdmin')
	
	<script type="text/javascript">
		$(document).ready(function(){
            
            $("#8").addClass("oscuro");                             
        });
	</script>

	<div class="large-12 columns" style="font-weight: bold !important;"><h3>Empresas</h3></div>
	<div class="large-12 columns prueba">

		<!--p>Hay {{ $datos->lastPage() }} pagina(s)</p-->
		<!--p>Hay {{ $datos->total() }} registro(s)</p-->
		<br>

		<table cellspacing="0">

			<tr class="encabezado">
				<th><h6>#</h6></th>
				<th><h6>Nombre</h6></th>
				<th><h6>Fecha</h6></th>
				<th><h6>Estado</h6></th>
				<th><h6>Acciones</h6></th>
			</tr>
			<!--{{ $i=0 }}-->
			@foreach ($datos as $dato)
			<tr>
				<!--td>{{ $dato->id }}</td-->
				<td>{{ $i = $i + 1 }}</td>
				<td>{{ $dato->razon_social }}</td>
				<td>{{ $dato->updated_at->format('d-m-Y') }}</td>
				<td>
					@if ( $dato->codigo_afiliacion == 0 )
						Sin Licencia
					@else ( $dato->estado_espera == 1 )
						Con Licencia
					@endif
				</td>
				<td>
					@if ( $dato->codigo_afiliacion == 0 )
						<a href="{{ route('empresas.afiliar', $dato->id) }}">Afiliar</a> -
					@endif
						<a href="{{ route('empresas.detalle', $dato->id) }}">Ver</a>
				</td>
			</tr>
			@endforeach

		</table>
		{!! $datos->render() !!}

	</div>
	
@endsection