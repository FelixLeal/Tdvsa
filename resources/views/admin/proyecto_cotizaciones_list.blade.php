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

	<div class="large-12 columns" style="font-weight: bold !important;"><h3>Cotizaciones del Proyecto: {{ $datos_proyecto->nombre_empresa }} </h3></div>
	<div class="large-12 columns prueba">

		<!--p>Hay {{ $datos_cotizaciones->lastPage() }} pagina(s)</p-->
		<!--p>Hay {{ $datos_cotizaciones->total() }} registro(s)</p-->
		<br>

		<table cellspacing="0">

			<tr class="encabezado">
				<th><h6>N°</h6></th>
				<th><h6>Proyecto</h6></th>
				<th><h6>Monto</h6></th>
				<th><h6>Fecha</h6></th>
				<th><h6>Estado</h6></th>
				<th><h6>Acciones</h6></th>
			</tr>
			<!--{{ $i=0 }}-->
			@foreach ($datos_cotizaciones as $dato)
			<tr>
				<!--td>{{ $dato->id }}</td-->
				<td>{{ $i = $i + 1 }}</td>
				<td>{{ $dato->concepto }}</td>
				<td class="monto">{{ number_format($dato->monto, 2, ',', '.') }}</td>
				<td>{{ $dato->updated_at->format('d-m-Y') }}</td>
				<td>
					@if ( $dato->estado == 0 )
						No Pagada
					@elseif ( $dato->estado == 1 )
						Pagada
					@else ( $dato->estado == 2 )
						Finalizada
					@endif
				</td>
				<td>
					<a href="{{ route('proyecto.cotizacion.detalle', $dato->id) }}">Ver</a>
					@if ( $dato->estado == 0 )
						<a href="{{ route('proyecto.cotizacion.pagar', $dato->id) }}">Pagar</a>
					@endif
					@if ( $dato->estado == 1 )
						<a href="{{ route('proyecto.cotizacion.finalizar', $dato->id) }}">Finalizar</a>
					@endif
				</td>
				
			</tr>
			@endforeach

		</table>
		{!! $datos_cotizaciones->render() !!}

	</div>

@endsection