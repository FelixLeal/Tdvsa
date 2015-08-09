@extends('layouts.admin')

@section('titleInicioAdmin')
	Bienvenido | Mobotix
@endsection

@section('contentInicioAdmin')
	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#7").addClass("oscuro");
		});
	</script>

	<div class="large-12 columns" style="font-weight: bold !important;"><h3>Usuarios</h3></div>
		@if ( Session::has('message'))
			<p class="alert alert-success">{{ Session::get('message') }}</p>
		@endif
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
				<td>{{ $dato->name }}</td>
				<td>{{ $dato->updated_at->format('d-m-Y') }}</td>
				<td>
					@if ( $dato->estado_registro == 0 )
						1er Paso
					@elseif ( $dato->estado_registro == 1 )
						2do Paso
					@elseif ( $dato->estado_registro == 2 )
						En Espera
					@else ( $dato->estado_registro == 3 )
						Activo
					@endif
				</td>
				<td>
					<a href="{{ route('usuarios.detalle', $dato->id) }}">Ver</a>
				</td>
			</tr>
			@endforeach

		</table>
		{!! $datos->render() !!}

	</div>
	
@endsection