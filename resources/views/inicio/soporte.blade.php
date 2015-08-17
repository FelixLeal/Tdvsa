@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')

	<script type="text/javascript">
        $(document).ready(function(){
            $("#9").addClass("oscuro");
        });
    </script>

	<div class="large-12 columns" style="font-weight: bold !important;"><h3>Descargas</h3></div>
	<div class="large-12 columns prueba">

		<!--p>Hay {{ $datos->lastPage() }} pagina(s)</p-->
		<!--p>Hay {{ $datos->total() }} registro(s)</p-->

		<table cellspacing="0">

			<tr class="encabezado">
				<th><h6 class="align-number-table">N°</h6></th>
				<th><h6>Nombre</h6></th>
				<th><h6>Ruta</h6></th>
				<th><h6>Acciones</h6></th>
			</tr>

			@foreach ($datos as $dato)
			<tr>
				<td>{{ $dato->id }}</td>
				<td>{{ $dato->name }}</td>
				<td>{{ $dato->address_file }}</td>
				<td>

					<a href="{{ url('download?path='.$dato->address_file) }}">
					    {{ $dato->name }}
					</a>

				</td>
				
			</tr>
			@endforeach

		</table>
		{!! $datos->render() !!}

	</div>
	
@endsection