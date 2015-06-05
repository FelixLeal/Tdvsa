@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')

	<div class="row panel" style="font-weight: bold; background-color: #ffffff;">
		<div class="large-12 columns" style="font-weight: bold !important;"><h3>Proyectos</h3></div>
		<div class="large-12 columns prueba">

			<!--p>Hay {{ $datos->lastPage() }} pagina(s)</p-->
			<p>Hay {{ $datos->total() }} registro(s)</p>

			<table cellspacing="0">

				<tr>
					<th>#</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Acciones</th>
				</tr>

				@foreach ($datos as $dato)
				<tr>
					<td>{{ $dato->id }}</td>
					<td>{{ $dato->nombre }}</td>
					<td>{{ $dato->descripcion }}</td>
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

			<a href="{{ url('inte/proyecto/create') }}" class="button large btn_crear" id="buttona" >Nuevo</a>

			<!--button type="submit" id="buttona" class="button large btn_crear" style="text-transform: uppercase;">Nuevo</button-->

		</div>
		
	</div>
	
@endsection