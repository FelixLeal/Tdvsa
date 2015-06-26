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

	
		<div class="large-12 columns" style="font-weight: bold !important;"><h3>Cotizaciones</h3></div>
		<div class="large-12 columns prueba">

			<!--p>Hay {{ $datos->lastPage() }} pagina(s)</p-->
			<!--p>Hay {{ $datos->total() }} registro(s)</p-->
			<br>

			<table cellspacing="0">

				<tr class="encabezado">
					<th><h6>#</h6></th>
					<th><h6>Concepto</h6></th>
					<th><h6>Monto</h6></th>
					<th><h6>Estado</h6></th>
				</tr>
				<!--{{ $i=0 }}-->
				@foreach ($datos as $dato)
				<tr>
					<td>{{ $i = $i + 1 }}</td>
					<td>{{ $dato->concepto }}</td>
					<td>{{ $dato->monto }}</td>	
					<td>
						@if ( $dato->estado == 1 )
							<a href="{{ route('detalle_coti', ['id_cotizacion' => $dato->id]) }}">Pagar</a>
						@endif
						@if ( $dato->estado == 0 )
							<a href="{{ route('detalle_coti', ['id_cotizacion' => $dato->id]) }}">Detalle</a>
						@endif
					</td>
					
				</tr>
				@endforeach

			</table>
			{!! $datos->render() !!}

		</div>
		
	
	
@endsection