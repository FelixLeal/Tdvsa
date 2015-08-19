@extends('layouts.admin')

@section('titleInicioAdmin')
	Bienvenido | Mobotix
@endsection

@section('contentInicioAdmin')
	
	<script type="text/javascript">
        $(document).ready(function() {
            $("#5").addClass("oscuro");
        });
    </script>

    <div class="report perfil large-12 columns">
        <div class="large-12 columns" style="font-weight: bold !important;"><h3> Detalles de Pago </h3></div>
        <div class="large-12 columns" >
            {!! Form::label('nombre_empresa', 'Realizado por') !!} 
            {!! Form::text('nombre_empresa', \DB::table('empresas')->where('id', '=', (\DB::table('users')->whereId($datos->id_user)->first()->id_empresa))->first()->razon_social, ['readonly']) !!}
        </div>

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
            <a href="{{ URL::previous() }}">Atras</a>
        </div>
    </div>
	
@endsection