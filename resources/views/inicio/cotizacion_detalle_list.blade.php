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

	<div class="large-12 columns" style="font-weight: bold !important;">
		<h3>{!! $coti_padre->concepto !!}</h3>
		<h5>{!! $coti_padre->updated_at->format('d-m-Y') !!}</h5>
	</div>
	<div class="large-12 columns prueba">

		<div class="proy_titulo">
			<div class="tit">{!! Form::label('concepto', 'Titulo del Proyecto:') !!}</div>
			{!! Form::label('concepto',  $coti_padre->concepto) !!}
		</div>

		<table cellspacing="0">

			<tr class="encabezado">
				<th class="align-number-table">N°</th>
				<th>Producto</th>
				<th class="canti">Cantidad</th>
				<th>Precio</th>
				<th>Cant * Precio</th>
			</tr>
			<!--{{ $i=0 }}-->
			@foreach ($datos as $dato)
			<tr>
				<td>{{ $i = $i + 1 }}</td>
				<td>{{ $productos->where('id', $dato->id_producto)->first()->nombre }}</td>
				<td class="canti">{{ $dato->cantidad }}</td>
				<td class="monto"><div class="hola">{{ number_format($dato->precio_unitario, 2, ',', '.') }}</div></td>
				<!-- {{ $sub_total = $dato->precio_unitario * $dato->cantidad }} -->
				<td class="monto"><div class="hola">{{ number_format($sub_total, 2, ',', '.') }}</div></td>
			</tr>
			@endforeach

		</table>

		{!! $datos->render() !!}

		<!--a href="{{ URL::previous() }}"> Atras </a-->
		<a href="{{ url('cotizacion_list') }}"> Atras </a>
		<div class="detalles_monto">
			{!! Form::label('monto',  number_format($coti_padre->monto, 2, ',', '.')) !!}
		</div>

	</div>
	
@endsection