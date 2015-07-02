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

	<div class="large-12 columns" style="font-weight: bold !important;"><h3>Mis Cotizaciones</h3></div>
	<div class="large-12 columns prueba">

		<!--p>Hay {{ $datos->lastPage() }} pagina(s)</p-->
		<!--p>Hay {{ $datos->total() }} registro(s)</p-->
		<br>

		<table cellspacing="0">

			<tr class="encabezado">
				<th><h6>N°</h6></th>
				<th><h6>Proyecto</h6></th>
				<th><h6>N° Productos</h6></th>
				<th><h6>Fecha</h6></th>
				<th><h6>Monto</h6></th>
				<th> </th>
			</tr>
			<!--{{ $i=0 }}-->
			@foreach ($datos as $dato)
			<tr>
				<td class="n_coti"><a href="">{{ $i = $i + 1 }}</a></td>
				<td>{{ $dato->concepto }}</td>
				<td></td>
				<td>{{ $dato->updated_at->format('d-m-Y') }}</td>
				<td>{{ $dato->monto }}</td>
				<td>
					<a href="{{ route('inte.proyecto.edit', $dato->id) }}">Ver detalles</a>
				</td>
				
			</tr>
			@endforeach

		</table>
		{!! $datos->render() !!}

	</div>
		
@endsection