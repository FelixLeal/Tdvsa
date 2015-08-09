@extends('layouts.admin')

@section('titleInicioAdmin')
	Bienvenido | Mobotix
@endsection

@section('contentInicioAdmin')
	
	<script type="text/javascript">
		$(document).ready(function(){
			$("#6").addClass("oscuro");
		});
	</script>

	<div class="large-12 columns" style="pading: 0px"><h3>Nuevo Usuario Administrador</h3>
		@if ( Session::has('message'))
			<p class="alert alert-success">{{ Session::get('message') }}</p>
		@endif

	    <form id="form_2" class="large-12" action="{{ url('admin/usuario/nuevo/{user}') }}" method="POST" >
	    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	        <div class="large-12 columns prod report" style="padding: 0px;">

                <label>Nombre de usuario</label>
				<input type="text" name="name" placeholder="Escribe el nombre de usuario" value="{{ old('name') }}">

                <label>Correo electrónico</label>
				<input type="email" name="email" placeholder="Indicanos tu correo" value="{{ old('email') }}">

                <label>Contraseña</label>
				<input type="password" name="password" placeholder="Escribe tu contraseña">

	            <button type="submit" id="buttona" class="button large" style="text-transform: uppercase;">Enviar</button>
	        </div>
		</form>

	</div>
	
@endsection