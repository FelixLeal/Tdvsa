@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')

	<div class="row panel" style="font-weight: bold; background-color: #ffffff;">
		<div class="large-12 columns" style="font-weight: bold !important;"><h3>Cotizaciones</h3></div>
		<div class="large-12 columns prueba">

			{!! Form::label('concepto', 'Titulo del Proyecto') !!}
			{!! Form::text('nombre',  $coti_padre->concepto) !!}

			{!! Form::label('monto', 'Monto') !!}
			{!! Form::text('descripcion', $coti_padre->monto) !!}

			<table cellspacing="0">

				<tr>
					<th>#</th>
					<th>Producto</th>
					<th>Cantidad</th>
					<th>Precio</th>
				</tr>
				<!--{{ $i=0 }}-->
				@foreach ($datos as $dato)
				<tr>
					<td>{{ $i = $i + 1 }}</td>
					<td>{{ $productos->where('id', $dato->id_producto)->first()->nombre }}</td>
					<td>{{ $dato->cantidad }}</td>
					<td>{{ $dato->precio_unitario }}</td>
				</tr>
				@endforeach

			</table>

			{!! $datos->render() !!}

			<!--a href="{{ URL::previous() }}"> Atras </a-->
			<a href="{{ url('cotizacion_list') }}"> Atras </a>

		</div>


		
	</div>
	
@endsection