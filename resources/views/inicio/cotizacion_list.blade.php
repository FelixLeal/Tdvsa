@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')
	<script type="text/javascript">
		$(document).ready(function(){
			$("#side2").removeClass("efecto");
			$("#4").addClass("oscuro");
		});
		function detalle() {
			el = document.getElementById("modal");
			el.style.visibility = (el.style.visibility == "visible") ? "hidden" : "visible";
		};
	</script>

	<div class="large-12 columns" style="font-weight: bold !important;"><h3>Mis Cotizaciones</h3></div>
	<div class="large-12 columns prueba">

		<!--p>Hay {{ $datos->lastPage() }} pagina(s)</p-->
		<!--p>Hay {{ $datos->total() }} registro(s)</p-->
		<br>

		<table cellspacing="0">

			<tr class="encabezado">
				<th><h6>N°</h6></th>
				<th><h6>Proyecto</h6></th>
				<th><h6>Monto</h6></th>
				<th><h6>Fecha</h6></th>
				<th><h6>Estado</h6></th>
			</tr>
			<!--{{ $i=0 }}-->
			@foreach ($datos as $dato)
			<tr>
				<td class="n_coti"><a href="#" onclick="detalle()">{{ $i = $i + 1 }}</a></td>
				<!--td>{{ $i = $i + 1 }}</td-->
				<td>{{ $dato->concepto }}</td>
				<td class="monto">{{ $dato->monto }}</td>
				<td>{{ $dato->updated_at->format('d-m-Y') }}</td>
				<td>
					<a href="{{ route('detalle_coti', ['id_cotizacion' => $dato->id]) }}" >Detalles</a>
					<!--a href="#" onclick="detalle()">Detalles</a-->
					@if ( $dato->estado == 0 )
						- <a href="{{ route('reporte_pago') }}">Pagar</a>
					@elseif ( $dato->estado == 1 )
						<p>Pagada</p>
					@endif
				</td>
				
			</tr>
			@endforeach

		</table>
		{!! $datos->render() !!}

	</div>

	<div id="modal" class="large-10 columns marco">
		<div class="mod-container">
			<h3> Cotizacion N° </h3>
			<table cellspacing="0">
				<tr class="modal_table">
					<th></th>
					<th>Producto</th>
					<th>Cantidad</th>
					<th>Precio</th>
					<th>Total</th>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>
			<div class="total_cot" style="float:right; padding: 10px;">Total cotizacion = <strong>1400,00 bsf</strong></div>
			<a id="buttona" onclick="detalle()" class="button large btn_crear btn_modal">Volver a Mis Cotizaciones</a>
		</div>
	</div>
		
@endsection