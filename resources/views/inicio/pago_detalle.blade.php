@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')
	
	<script type="text/javascript">
        $(document).ready(function() {
            $("#7").addClass("oscuro");
        });
    </script>

    <div class="report perfil large-12 columns">
        <div class="large-12 columns" style="font-weight: bold !important;"><h3> Detalles de Pago </h3></div>

        <div class="large-12 columns">
            {!! Form::label('nro_documento', 'Nro del Documento') !!}
            {!! Form::text('nro_documento', $datos->nro_documento, ['readonly']) !!}
        </div>

        <div class="large-12 columns">
            {!! Form::label('forma_pago', 'Forma de Pago') !!}
            {!! Form::text('forma_pago', $datos->forma_pago, ['readonly']) !!}
        </div>

        <div class="large-12 columns">
            {!! Form::label('monto', 'Monto') !!}
            {!! Form::text('monto', $datos->monto, ['readonly']) !!}
        </div>
        
        <div class="large-12 columns">
            {!! Form::label('fecha_transaccion', 'Fecha de la Transaccion') !!}
            {!! Form::text('fecha_transaccion', $datos->fecha_transaccion, ['readonly']) !!}
        </div>

        <div class="large-12 columns">
            {!! Form::label('comentario', 'Comentario') !!}
            {!! Form::textarea('comentario', $datos->comentario, ['readonly']) !!}
        </div>

        <div class="large-12 columns">
            <a href="{{ URL::previous() }}" id="buttona" class="button large" style="text-transform: uppercase;">Atras</a>
        </div>
    </div>
	
@endsection