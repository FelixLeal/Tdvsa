@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')

	<div class="large-12 columns" style="font-weight: bold !important;"><h3>Cotización Actual</h3></div>

	<!-- Flash Notice -->
	<div class="large-8 columns">
		@if (Session::has('new_product'))
		    <div data-alert class="alert-box success">
		    	{{ Session::get('new_product') }}
		    	<button tabindex="0" class="close" aria-label="Close Alert">&times;</button>
		    </div>
		@endif
	</div>

	<div class="large-12 columns prueba">

		<!--p>Hay {{ $datos->lastPage() }} pagina(s)</p-->
		<!--p>Hay {{ $datos->total() }} registro(s)</p-->
		<br>

		<table cellspacing="0">
			<tr>
				<th class="align-number-table">N°</th>
				<th>Producto</th>
				<th class="canti">Cantidad</th>
				<th>Precio</th>
				<th>Acciones</th>
			</tr>
			<!--{{ $i=0 }}-->
			<!--{{ $total=0 }}-->
			@foreach ($datos as $dato)
			<tr>
				<td>{{ $i = $i + 1 }}</td>
				<td>{{ $productos->where('id', $dato->id_producto)->first()->nombre }}</td>
				<td class="canti">{{ $dato->cantidad }}</td>
				<td class="monto"><div class="hola">{{ number_format($dato->precio_unitario, 2, ',', '.') }}</div></td>
				<td><a href="{{ route('detalle_coti.detalle.modificar', $dato->id) }}">Editar</a></td>
				<!-- {{ $total =  $total + ($dato->cantidad * $dato->precio_unitario) }} -->
			</tr>
			@endforeach
			<tr>
				<td></td>
				<td></td>
				<td>Total</td>
				<td class="monto">{{ number_format($total, 2, ',', '.') }}</td>
				<td></td>
			</tr>
		</table>
		{!! $datos->render() !!}
		<!--{{ $uno =  DB::table('proyecto_actuals')->where('id_user', '=', Auth::id())->first()->id_proyecto }}-->
		<!--{{ $dos =  DB::table('proyectos')->whereId($uno)->first()->nombre_empresa }}-->
		<a href="{{ route('inte.cotiz.create', ['id_proyecto' => $uno, 'concepto' => $dos] ) }}" class="button large btn_crear" id="buttona" > Atras </a>
	</div>
	
@endsection