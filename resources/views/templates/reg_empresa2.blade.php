@extends('layouts.register')

@section('titleRegister')
	Registro | Mobotix
@endsection

@section('contentRegister')

	<div class="row panel" style="" id="encabezado_2">
		<div class="small-4 large-4 columns hide-for-small-only" id="ultim_"><h4>Crear cuenta</h4></div>			  
		<div class="small-4 large-4 columns hide-for-small-only" ><h4>Ingresar datos</h4></div>
		<div class="small-12 large-4 columns" id="select_"><h4>Rif y RC</h4></div>
	</div>

	<div class="row" style="margin-top: 15px;">

		<form id="form_2" class="small-10 large-4 columns" action="{{ url('/auth/guardar3') }}" method="POST" enctype="multipart/form-data">

			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<label>Rif</label>
			<input type="text" name="rif" placeholder="Ingresa el Rif">

			<label>Registro Mercantil</label>
			<input type="file" name="registro_mercantil" file="true" placeholder="Upload al documento">


			<label>Direccion</label>
			<input type="text" name="direccion" placeholder="Tipea la direccion de la empresa" height="100">

			<label>Codigo Postal</label>
			<input type="text" name="codigo_postal" placeholder="Ej: 3001">


			<label>Telefono</label>
			<input type="text" name="telf_empresa" placeholder="Ingresa el # telefonico">

			<button type="submit" id="buttona" class="button large" style="text-transform: uppercase;">Enviar</button>

			<a href="{{ url('/auth/logout') }}" id="buttona"class="button large" style="text-transform: uppercase;">Salir</a>

		</form>
		
		<div class="small-8 large-7 columns hide-for-small-only" >

			<div class="row" style="margin-top: 20%;">
				<div id="leyenda_2">
					Bienvenido.<br>
					Estas  punto de iniciar el proceso de creacion de tu cuenta como<br>
					integrador de TDVSA.<br>
					Por favor llena el siguiente formulario son tu datos.
				</div>
			</div>

			<br>
			<br>

			@if (count($errors) > 0)
				<div class="alert alert-danger" style="width: 100%; margin: 0 auto;">
					<!--strong>Whoops!</strong> There were some problems with your input.<br><br-->
					<strong>Whoops!</strong> Hubo algunos problemas con su entrada.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
		</div>

	</div>

@endsection