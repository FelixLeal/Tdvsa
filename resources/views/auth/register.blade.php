@extends('layouts.register')

@section('titleRegister')
	Registro | Mobotix
@endsection

@section('contentRegister')

	<div class="row panel" style="" id="encabezado_2">
		<div class="small-12 large-4 columns" id="select_">
			<h4>Crear cuenta</h4>
		</div>
		<div class="small-4 large-4 columns hide-for-small-only">
			<h4>Ingresar datos</h4>
		</div>
		<div class="small-4 large-4 columns hide-for-small-only" id="ultim_">
			<h4>Rif y RC</h4>
		</div>
	</div>

	<div class="row" style="margin-top: 15px;">

		<form id="form_2" class="small-10 large-4 columns" action="{{ url('/auth/register') }}" method="POST" >

			<input type="hidden" name="_token" value="{{ csrf_token() }}">

			<label>Nombre de usuario</label>
			<input type="text" name="name" placeholder="Escribe el nombre de usuario" value="{{ old('name') }}">

			<label>Correo electrónico</label>
			<input type="email" name="email" placeholder="Indicanos tu correo" value="{{ old('email') }}">

			<label>Contraseña</label>
			<input type="password" name="password" placeholder="Escribe tu contraseña">

			<label>Repetir contraseña</label>
			<input type="password" name="password_confirmation" placeholder="Por favor, repite la contraseña">

			<button type="submit" id="buttona" class="button large large centerd" style="text-transform: uppercase;">Seguir</button>

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
