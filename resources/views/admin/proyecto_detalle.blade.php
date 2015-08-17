@extends('layouts.admin')

@section('titleInicioAdmin')
	Bienvenido | Mobotix
@endsection

@section('contentInicioAdmin')
	
	<script type="text/javascript">
        $(document).ready(function() {
            $("#4").addClass("oscuro");
        });
    </script>

    <div class="report perfil large-12 columns">
        <div class="large-12 columns" style="font-weight: bold !important;"><h3>Detalles del Proyecto: {{ $datos->nombre_empresa }} </h3></div>
            @if ( Session::has('message'))
                <p class="alert alert-success">{{ Session::get('message') }}</p>
            @endif
        <div class="large-12 columns">
            {!! Form::label('nro_control', 'Nro de Control') !!}
            {!! Form::text('nro_control', $datos->nro_control, ['placeholder' => 'Nro de Control', 'readonly' ] ) !!}
        </div>

        <div class="large-12 columns">
            {!! Form::label('nombre_empresa', 'Nombre de la Empresa') !!}
            {!! Form::text('nombre_empresa', $datos->nombre_empresa, ['placeholder' => 'Nombre de la Empresa', 'readonly'] ) !!}
        </div>

        <div class="large-12 columns">
            {!! Form::label('descripcion', 'Descripción de requerimientos') !!}
            {!! Form::textarea('descripcion', $datos->descripcion, ['placeholder' => 'Descripción de requerimientos', 'readonly'] ) !!}
        </div>
       
        @if ( $datos->estado_espera == 0 )
            <div class="large-12 columns">
    			<a id="buttona" class="button large" href="{{ route('proyecto.verificar', $datos->id) }}">Verificar</a>
            </div>
		@endif
        @if ( $datos->estado_espera == 1 )
            <div class="large-12 columns">
                <a id="buttona" class="button large" href="{{ route('proyecto.cotizaciones', $datos->id) }}">Ver Cotizaciones</a>
            </div>
        @endif
    </div>
	
@endsection