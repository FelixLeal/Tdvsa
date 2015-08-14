@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')

	<div class="large-12 columns" style="font-weight: bold !important;"><h3>Cotización Actual</h3></div>
	<div class="large-12 columns prueba">

		<!--p>Hay {{ $datos->lastPage() }} pagina(s)</p-->
		<!--p>Hay {{ $datos->total() }} registro(s)</p-->
		<br>

		<table cellspacing="0">

			<tr class="encabezado">
				<th>N°</th>
				<th>Producto</th>
				<th>Cantidad</th>
				<th>Precio</th>
				<th>Acciones</th>
			</tr>
			<!--{{ $i=0 }}-->
			<!--{{ $total=0 }}-->
			@foreach ($datos as $dato)
			<tr>
				<td>{{ $i = $i + 1 }}</td>
				<td>{{ $productos->where('id', $dato->id_producto)->first()->nombre }}</td>
				<td>{{ $dato->cantidad }}</td>
				<td class="monto"><div class="hola">{{ $dato->precio_unitario }}</div></td>
				<td><a href="{{ route('detalle_coti.detalle.modificar', $dato->id) }}">Editar</a></td>
				<!-- {{ $total =  $total + ($dato->cantidad * $dato->precio_unitario) }} -->
			</tr>
			@endforeach
			<tr>
				<td></td>
				<td></td>
				<td>Total</td>
				<td>{{ $total }}</td>
				<td></td>
			</tr>
		</table>
		{!! $datos->render() !!}
		<a href="{{ URL::previous() }}" class="button large btn_crear" id="buttona" > Atras </a>
	</div>
	
@endsection