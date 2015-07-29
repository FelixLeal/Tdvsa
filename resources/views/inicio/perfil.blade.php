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
        <div class="large-12 columns campos" >
            {!! Form::label('nombre_persona', 'Nombre y Apellido:') !!}
            <div class="labelReal">{!! Form::label('nombre_persona', $empresa->nombre_persona) !!}</div> 
        </div>

        <div class="large-12 columns campos">
            {!! Form::label('telf_persona', 'Telefono:') !!}
             <div class="labelReal">{!! Form::text('telf_persona', $empresa->telf_persona, ['disabled' => false]) !!}</div>
        </div>

        <div class="large-12 columns campos">
            {!! Form::label('email', 'Correo Electronico:') !!}
             <div class="labelReal">{!! Form::text('email', $user->email, ['disabled' => true]) !!}</div>
        </div>

        <div class="large-12 columns campos">
            {!! Form::label('res_razon_social', 'Empresa:') !!}
             <div class="labelReal">{!! Form::label('res_razon_social', $empresa->razon_social, ['disabled' => true]) !!}</div>
        </div>

        <div class="large-12 columns campos">
            {!! Form::label('codigo_afiliacion', 'Codigo de afiliación:') !!}
             <div class="labelReal">{!! Form::label('codigo_afiliacion', $empresa->codigo_afiliacion, ['disabled' => true]) !!}</div>
        </div>

        <div class="large-12 columns" style="font-weight: bold !important;"><h3>Empresa</h3></div>
        <div class="large-12 columns campos">
            {!! Form::label('razon_social', 'Razon Social:') !!}
             <div class="labelReal">{!! Form::label('razon_social', $empresa->razon_social, ['disabled' => true]) !!}</div>
        </div>

        <div class="large-12 columns campos">
            {!! Form::label('rif', 'RIF:') !!}
             <div class="labelReal">{!! Form::label('rif', $empresa->rif, ['disabled' => true]) !!}</div>
        </div>

        <div class="large-12 columns campos">
        	{!! Form::label('email_empresa', 'Correo Electronico:') !!}
            <div class="labelReal">{!! Form::text('email_empresa', $empresa->email_empresa, ['disabled' => true]) !!}</div>
        </div>

        <div class="large-12 columns campos">
            {!! Form::label('direccion', 'Direccion:') !!}
             <div class="labelReal">{!! Form::text('direccion', $empresa->direccion, ['disabled' => true]) !!}</div>
        </div>

        <div class="large-12 columns campos">
            {!! Form::label('telf_empresa', 'Telefono:') !!}
             <div class="labelReal">{!! Form::text('telf_empresa', $empresa->telf_empresa, ['disabled' => true]) !!}</div>
        </div>
 
        <div class="large-12 columns campos">
            {!! Form::label('registro_mercantil', 'Registro Mercantil:') !!}
             <div class="labelReal">{!! Form::label('registro_mercantil', $empresa->registro_mercantil, ['disabled' => true]) !!}</div>
        </div>
        
         <!-- Otro Div -->
        <div class="large-12 columns" style="font-weight: bold !important;"><h3>Usuario</h3></div>
        <div class="large-12 columns campos">
            {!! Form::label('name', 'Nombre de Usuario:') !!}
             <div class="labelReal">{!! Form::text('name', $user->name, ['disabled' => true]) !!}</div>
        </div>

        <div class="large-12 columns campos">
            {!! Form::label('email', 'Correo Electronico:') !!}
             <div class="labelReal">{!! Form::text('email', $user->email, ['disabled' => true]) !!}</div>
        </div>

        <div class="large-12 columns">
            <button type="submit" id="buttona" class="button large" style="text-transform: uppercase;">guardar cambios</button>
        </div>
    </div>
	
@endsection