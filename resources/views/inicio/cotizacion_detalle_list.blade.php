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
	</script>

	<div class="large-12 columns" style="font-weight: bold !important;"><h3>Cotizaciones</h3></div>
	<div class="large-12 columns prueba">

		<div class="proy_titulo">
			<div class="tit">{!! Form::label('concepto', 'Titulo del Proyecto:') !!}</div>
			{!! Form::label('concepto',  $coti_padre->concepto) !!}
		</div>

		<table cellspacing="0">

			<tr class="encabezado">
				<th>N°</th>
				<th>Producto</th>
				<th>Cantidad</th>
				<th>Precio</th>
				<th>Cant * Precio</th>
			</tr>
			<!--{{ $i=0 }}-->
			@foreach ($datos as $dato)
			<tr>
				<td>{{ $i = $i + 1 }}</td>
				<td>{{ $productos->where('id', $dato->id_producto)->first()->nombre }}</td>
				<td>{{ $dato->cantidad }}</td>
				<td class="monto">{{ number_format($dato->precio_unitario, 2, ',', '.') }}</td>
				{{ $sub_total = $dato->precio_unitario * $dato->cantidad }}
				<td class="monto">{{ number_format($sub_total, 2, ',', '.') }}</td>
			</tr>
			@endforeach

		</table>

		{!! $datos->render() !!}

		<!--a href="{{ URL::previous() }}"> Atras </a-->
		<a href="{{ url('cotizacion_list') }}" class="button large btn_crear" id="buttona" > Atras </a>
		<div class="detalles_monto">
			{!! Form::label('monto', $coti_padre->monto) !!}
		</div>

	</div>
	
@endsection