@extends('layouts.admin')

@section('titleInicioAdmin')
	Bienvenido | Mobotix
@endsection

@section('contentInicioAdmin')

	<script type="text/javascript">
		$(document).ready(function(){
			$("#4").addClass("oscuro");
		});
	</script>

	<div class="large-12 columns" style="font-weight: bold !important;"><h3>Proyectos</h3></div>
	<div class="large-12 columns prueba">

		<!--p>Hay {{ $datos->lastPage() }} pagina(s)</p-->
		<!--p>Hay {{ $datos->total() }} registro(s)</p-->
		<br>

		<table cellspacing="0">

			<tr class="encabezado">
				<th><h6>N°</h6></th>
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
				<td>{{ $dato->nombre }}</td>
				<td>{{ $dato->updated_at->format('d-m-Y') }}</td>
				<td>
					@if ( $dato->estado_espera == 1 )
						Verificado
					@elseif ( $dato->estado_espera == 2 )
						Rechazado
					@elseif ( $dato->estado_espera == 3 )
						Finalizado
					@else
						En espera
					@endif
				</td>
				<td>
					<a href="{{ route('proyecto.detalle', $dato->id) }}">Ver</a>
					@if ( $dato->estado_espera == 0 )
						- <a href="{{ route('proyecto.verificar', $dato->id) }}">Verificar</a>
					@endif
					@if ( $dato->estado_espera == 1 )
						- <a href="{{ route('proyecto.finalizar', $dato->id) }}">Finalizar</a>
					@endif
				</td>
				
			</tr>
			@endforeach

		</table>
		{!! $datos->render() !!}

	</div>

@endsection