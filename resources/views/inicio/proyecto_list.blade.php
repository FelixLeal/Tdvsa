@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')
	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#side2").removeClass("efecto");
			$("#2").addClass("oscuro");
		});
	</script>

	<div class="large-12 columns" style="font-weight: bold !important;"><h3>Proyectos</h3></div>
	<div class="large-12 columns prueba">

		<!--p>Hay {{ $datos->lastPage() }} pagina(s)</p-->
		<!--p>Hay {{ $datos->total() }} registro(s)</p-->
		<br>

		<table cellspacing="0">

			<tr class="encabezado">
				<th><h6 class="align-number-table">N°</h6></th>
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
				<td><a href="{{ route('inte.proyecto.edit', $dato->id) }}">{{ $dato->nombre_empresa }}</a></td>
				<td>{{ $dato->updated_at->format('d-m-Y') }}</td>
				<td>
					@if ( $dato->estado_espera == 1 )
						Aprobado
					@elseif ( $dato->estado_espera == 2 )
						Rechazado
					@elseif ( $dato->estado_espera == 3 )
						Finalizado
					@else
						En espera
					@endif
				</td>
				<td>
					@if ( $dato->estado_espera != 3 )

						<!--a href="{{ url('inte/proyecto') }}">Eliminar1</a      se puede usar asi o asi abajo         --> 
						<!--a href="{{ route('inte.proyecto.destroy', $dato) }}">Eliminar</a-->

						@if ( $dato->estado_espera == 1 )

							<a href="{{ route('inte.cotiz.create', ['id_proyecto' => $dato->id, 'concepto' => $dato->nombre_empresa]) }}">Cotizar</a>
							<!--a href="{{ url('inte/nuevo', $dato) }}">Cotizar</a-->

						@endif
					@endif

				</td>
				
			</tr>
			@endforeach

		</table>
		{!! $datos->render() !!}

		<a href="{{ url('inte/proyecto/create') }}" class="button large btn_crear" id="buttona" >Crear Nuevo Proyecto</a>

	</div>
	
@endsection