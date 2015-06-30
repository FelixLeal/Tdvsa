@extends('layouts.login')

@section('titleLogin')
	Login | Mobotix
@endsection

@section('contentLogin')
<div class="container-fluid">
	<div class="row">
		<div class="small-12 columns" id="principal">
			<div class="row" id="content_login"> 
				<div class="small-6 columns small-centered" id="img">
					<img  id ="imagen" src="{{ asset('/img/logo-tdvsa-med2.png') }}">
				</div>
				<div class="small-12 columns" id="img">
					<div class="small-12 small-centered columns" id="encabezados_login">
						<h2>INTEGRADORES TDVSA</h2>
						<p class="subheader">Inicia sesion para acceder a tu cuenta</p>
					</div>
				</div>
				<div class="small-12 columns" id="img">
					<form class="small-5 small-centered columns show-for-large-only" action="{{ url('/auth/login') }}" method="POST" >
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="email" class="form-control" name="email" placeholder="EMAIL" style="margin-bottom: 0px;">
						<input type="password" class="form-control" name="password" placeholder="CONTRASEÑA" style="margin-bottom: 0px;">
						<button type="submit" class="button expand">ingresar</button>
						<div class="small-12 small-centered columns">
						<a href="{{ url('/auth/register') }}" >¿No tienes cuenta? Regístrate aquí</a>
						</div>
					</form>

					<form class="small-12 small-centered columns show-for-medium-only" action="{{ url('/auth/login') }}" method="POST" >
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="email" class="form-control" name="email" placeholder="EMAIL" style="margin-bottom: 0px;">
						<input type="password" class="form-control" name="password" placeholder="CONTRASEÑA" style="margin-bottom: 0px;">
						<button type="submit" class="button expand">ENVIAR</button>
						<a href="{{ url('/auth/register') }}" class="button expand">Registrarse</a>
					</form>

					<form class="small-12 small-centered columns show-for-small-only" action="{{ url('/auth/login') }}" method="POST" >
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="email" class="form-control" name="email" placeholder="EMAIL" style="margin-bottom: 0px;">
						<input type="password" class="form-control" name="password" placeholder="CONTRASEÑA" style="margin-bottom: 0px;">
						<button type="submit" class="button expand">ENVIAR</button>
						<a href="{{ url('/auth/register') }}" class="button expand">Registrarse</a>
					</form>

					<form class="small-6 small-centered columns show-for-xlarge-only" action="{{ url('/auth/login') }}" method="POST" >
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="email" class="form-control" name="email" placeholder="EMAIL" style="margin-bottom: 0px;">
						<input type="password" class="form-control" name="password" placeholder="CONTRASEÑA" style="margin-bottom: 0px;">
						<button type="submit" class="button expand">ENVIAR</button>
						<a href="{{ url('/auth/register') }}">Registrarse</a>
					</form>
				</div>
			</div>

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
</div>
@endsection

