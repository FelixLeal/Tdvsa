@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')
        <script type="text/javascript">
                    $(document).ready(function(){
                            $("#7").addClass("oscuro");
                                                    
                        });
        </script>

    
    <div class="report perfil large-12 columns">
        <div class="large-12 columns" style="font-weight: bold !important;"><h3>Responsable</h3></div>
        <div class="large-12 columns" >
            {!! Form::label('nombre_persona', 'Nombre y Apellido') !!} 
            {!! Form::label('nombre_persona', $empresa->nombre_persona) !!}
        </div>

        <div class="large-12 columns">
            {!! Form::label('telf_persona', 'Telefono') !!}
            {!! Form::text('telf_persona', $empresa->telf_persona, ['disabled' => false]) !!}
        </div>

        <div class="large-12 columns">
            {!! Form::label('email', 'Correo Electronico') !!}
            {!! Form::text('email', $user->email, ['disabled' => true]) !!}
        </div>

        <div class="large-12 columns">
            {!! Form::label('res_razon_social', 'Empresa') !!}
            {!! Form::label('res_razon_social', $empresa->razon_social, ['disabled' => true]) !!}
        </div>

        <div class="large-12 columns">
            {!! Form::label('codigo_afiliacion', 'Codigo de afiliación') !!}
            {!! Form::label('codigo_afiliacion', $empresa->codigo_afiliacion, ['disabled' => true]) !!}
        </div>

        <div class="large-12 columns" style="font-weight: bold !important;"><h3>Empresa</h3></div>
        <div class="large-12 columns">
            {!! Form::label('razon_social', 'Razon Social') !!}
            {!! Form::label('razon_social', $empresa->razon_social, ['disabled' => true]) !!}
        </div>

        <div class="large-12 columns">
            {!! Form::label('rif', 'RIF') !!}
            {!! Form::label('rif', $empresa->rif, ['disabled' => true]) !!}
        </div>

        <div class="large-12 columns">
        	{!! Form::label('email_empresa', 'Correo Electronico') !!}
            {!! Form::text('email_empresa', $empresa->email_empresa, ['disabled' => true]) !!}
        </div>

        <div class="large-12 columns">
            {!! Form::label('direccion', 'Direccion') !!}
            {!! Form::text('direccion', $empresa->direccion, ['disabled' => true]) !!}
        </div>

        <div class="large-12 columns">
            {!! Form::label('telf_empresa', 'Telefono') !!}
            {!! Form::text('telf_empresa', $empresa->telf_empresa, ['disabled' => true]) !!}
        </div>

        <div class="large-12 columns">
            {!! Form::label('registro_mercantil', 'Registro Mercantil') !!}
            {!! Form::label('registro_mercantil', $empresa->registro_mercantil, ['disabled' => true]) !!}
        </div>
        
         <!-- Otro Div -->
        <div class="large-12 columns" style="font-weight: bold !important;"><h3>Usuario</h3></div>
        <div class="large-12 columns">
            {!! Form::label('name', 'Nombre de Usuario') !!}
            {!! Form::text('name', $user->name, ['disabled' => true]) !!}
        </div>

        <div class="large-12 columns">
            {!! Form::label('email', 'Correo Electronico') !!}
            {!! Form::text('email', $user->email, ['disabled' => true]) !!}
        </div>

        <div class="large-12 columns">
            <button type="submit" id="buttona" class="button large" style="text-transform: uppercase;">guardar cambios</button>
        </div>
    </div>
	
@endsection