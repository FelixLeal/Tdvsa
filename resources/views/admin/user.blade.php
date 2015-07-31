@extends('layouts.admin')

@section('titleInicioAdmin')
	Bienvenido | Mobotix
@endsection

@section('contentInicioAdmin')
    <script type="text/javascript">
		$(document).ready(function(){
			$("#side2").removeClass("efecto");		    		    		        
		});
	</script>

	<div class="large-12 columns" style="font-weight: bold !important;"><h3>Usuarios</h3></div>
	<div class="large-12 columns prueba">

		<!--p>Hay {{ $datos->lastPage() }} pagina(s)</p-->
		<!--p>Hay {{ $datos->total() }} registro(s)</p-->
		<br>

		<table cellspacing="0">

			<tr class="encabezado">
				<th><h6>#</h6></th>
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
				<td>{{ $dato->nombre }}</td>
				<td>{{ $dato->updated_at->format('d-m-Y') }}</td>
				<td>
					@if ( $dato->estado_espera == 2 )
						<p>Aprobado</p>
					@elseif ( $dato->estado_espera == 3 )
						<p>Rechazado</p>
					@elseif ( $dato->estado_espera == 4 )
						<p>Finalizado</p>
					@else
						<p>En espera</p>
					@endif
				</td>
				<!--td>{{--{{ $dato->descripcion }} --}}</td-->
				<td>
					<a href="{{ route('inte.proyecto.edit', $dato->id) }}">Editar</a>
					<!--a href="{{ url('inte/proyecto') }}">Eliminar1</a      se puede usar asi o asi abajo         --> 
					<!--a href="{{ route('inte.proyecto.destroy', $dato) }}">Eliminar</a-->

					@if ( $dato->estado_espera == 1 )

						<a href="{{ route('inte.cotiz.create', ['id_proyecto' => $dato->id, 'concepto' => $dato->nombre]) }}">Cotizar</a>
						<!--a href="{{ url('inte/nuevo', $dato) }}">Cotizar</a-->

					@endif

				</td>
				
			</tr>
			@endforeach

		</table>
		{!! $datos->render() !!}

		<a href="{{ url('inte/proyecto/create') }}" class="button large btn_crear" id="buttona" >Crear Nueva Cotización</a>

	</div>
	
@endsection