@extends('layouts.admin')

@section('titleInicioAdmin')
	Bienvenido | Mobotix
@endsection

@section('contentInicioAdmin')
	
	<script type="text/javascript">
        $(document).ready(function() {
            $("#7").addClass("oscuro");
        });
    </script>

    <div class="report perfil large-12 columns">
        <div class="large-12 columns" style="font-weight: bold !important;"><h3>Responsable</h3></div>
        <div class="large-12 columns" >
            {!! Form::label('nombre_persona', 'Nombre y Apellido') !!} 
            {!! Form::text('nombre_persona', $datos_empresa->nombre_persona, ['readonly']) !!}
        </div>

        <div class="large-12 columns">
            {!! Form::label('telf_persona', 'Telefono') !!}
            {!! Form::text('telf_persona', $datos_empresa->telf_persona, ['readonly']) !!}
        </div>

        <div class="large-12 columns">
            {!! Form::label('email', 'Correo Electronico') !!}
            {!! Form::text('email', $datos_usuario->email, ['readonly']) !!}
        </div>

        <div class="large-12 columns">
            {!! Form::label('res_razon_social', 'Empresa') !!}
            {!! Form::text('res_razon_social', $datos_empresa->razon_social, ['readonly']) !!}
        </div>
        
        <div class="large-12 columns">
            {!! Form::label('codigo_afiliacion', 'Codigo de afiliación') !!}
            {!! Form::text('codigo_afiliacion', $datos_empresa->codigo_afiliacion, ['readonly']) !!}
        </div>
        
        <div class="large-12 columns" style="font-weight: bold !important;"><h3>Empresa</h3></div>
        <div class="large-12 columns">
            {!! Form::label('razon_social', 'Razon Social') !!}
            {!! Form::text('razon_social', $datos_empresa->razon_social, ['readonly']) !!}
        </div>
        
        <div class="large-12 columns">
            {!! Form::label('rif', 'RIF') !!}
            {!! Form::text('rif', $datos_empresa->rif, ['readonly']) !!}
        </div>
        
        <div class="large-12 columns">
            {!! Form::label('email_empresa', 'Correo Electronico') !!}
            {!! Form::text('email_empresa', $datos_empresa->email_empresa, ['readonly']) !!}
        </div>
        
        <div class="large-12 columns">
            {!! Form::label('direccion', 'Direccion') !!}
            {!! Form::text('direccion', $datos_empresa->direccion, ['readonly']) !!}
        </div>
        
        <div class="large-12 columns">
            {!! Form::label('telf_empresa', 'Telefono') !!}
            {!! Form::text('telf_empresa', $datos_empresa->telf_empresa, ['readonly']) !!}
        </div>

        <div class="large-12 columns">
            {!! Form::label('registro_mercantil', 'Registro Mercantil') !!}
            {!! Form::text('registro_mercantil', $datos_empresa->registro_mercantil, ['readonly']) !!}
        </div>
        
        <!-- Otro Div -->
        <div class="large-12 columns" style="font-weight: bold !important;"><h3>Usuario</h3></div>
        <div class="large-12 columns">
            {!! Form::label('name', 'Nombre de Usuario') !!}
            {!! Form::text('name', $datos_usuario->name, ['readonly']) !!}
        </div>

        <div class="large-12 columns">
            {!! Form::label('email', 'Correo Electronico') !!}
            {!! Form::text('email', $datos_usuario->email, ['readonly']) !!}
        </div>

        @if ( $datos_empresa->codigo_afiliacion == 0 )
			<a id="buttona" class="button large" href="{{ route('empresas.afiliar', $datos_empresa->id) }}">Afiliar</a>
		@endif
    </div>
	
@endsection