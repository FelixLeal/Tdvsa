@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')

    <div class="large-12 columns" style="font-weight: bold !important;"><h3>Responsable</h3></div>

    <div class="large-4 columns">
        {!! Form::label('nombre_persona', 'Nombre y Apellido') !!}
        {!! Form::text('nombre_persona', $empresa->nombre_persona, ['disabled' => true]) !!}
    </div>

    <div class="large-4 columns">
        {!! Form::label('telf_persona', 'Telefono') !!}
        {!! Form::text('telf_persona', $empresa->telf_persona, ['disabled' => true]) !!}
    </div>

    <div class="large-4 columns">
        {!! Form::label('email', 'Correo Electronico') !!}
        {!! Form::text('email', $user->email, ['disabled' => true]) !!}
    </div>

    <div class="large-4 columns">
        {!! Form::label('res_razon_social', 'Empresa') !!}
        {!! Form::text('res_razon_social', $empresa->razon_social, ['disabled' => true]) !!}
    </div>

    <div class="large-4 columns">
        {!! Form::label('codigo_afiliacion', 'Codigo de afiliación') !!}
        {!! Form::text('codigo_afiliacion', $empresa->codigo_afiliacion, ['disabled' => true]) !!}
    </div>

    <div class="large-12 columns" style="font-weight: bold !important;"><h3>Empresa</h3></div>
    <div class="large-4 columns">
        {!! Form::label('razon_social', 'Razon Social') !!}
        {!! Form::text('razon_social', $empresa->razon_social, ['disabled' => true]) !!}
    </div>

    <div class="large-4 columns">
        {!! Form::label('rif', 'RIF') !!}
        {!! Form::text('rif', $empresa->rif, ['disabled' => true]) !!}
    </div>

    <div class="large-4 columns">
    	{!! Form::label('email_empresa', 'Correo Electronico') !!}
        {!! Form::text('email_empresa', $empresa->email_empresa, ['disabled' => true]) !!}
    </div>

    <div class="large-4 columns">
        {!! Form::label('direccion', 'Direccion') !!}
        {!! Form::text('direccion', $empresa->direccion, ['disabled' => true]) !!}
    </div>

    <div class="large-4 columns">
        {!! Form::label('telf_empresa', 'Telefono') !!}
        {!! Form::text('telf_empresa', $empresa->telf_empresa, ['disabled' => true]) !!}
    </div>

    <div class="large-4 columns">
        {!! Form::label('registro_mercantil', 'Registro Mercantil') !!}
        {!! Form::text('registro_mercantil', $empresa->registro_mercantil, ['disabled' => true]) !!}
    </div>
    
     <!-- Otro Div -->
    <div class="large-12 columns" style="font-weight: bold !important;"><h3>Usuario</h3></div>
    <div class="large-4 columns">
        {!! Form::label('name', 'Nombre de Usuario') !!}
        {!! Form::text('name', $user->name, ['disabled' => true]) !!}
    </div>

    <div class="large-4 columns">
        {!! Form::label('email', 'Correo Electronico') !!}
        {!! Form::text('email', $user->email, ['disabled' => true]) !!}
    </div>

    <div class="large-12 columns">
        <div class="large-3 button">Editar Clave</div>
    </div>
	
@endsection