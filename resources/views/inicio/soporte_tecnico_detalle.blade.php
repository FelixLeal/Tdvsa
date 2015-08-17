@extends('layouts.inicio')

@section('titleInicio')
	Bienvenido | Mobotix
@endsection

@section('contentInicio')

    <script type="text/javascript">
        $(document).ready(function(){
            $("#8").addClass("oscuro");
        });
    </script>

    <div class="large-12 columns" style="pading: 0px"><h3>Soporte Técnico</h3></div>

    {!! Form::open( ['route' => 'soporte_tecnico.store', 'id' => 'form_2', 'class' => 'large-12' ] ) !!}
        <div class="large-12 columns prod report" style="padding: 0px;">
            <div class="large-12 columns alto-estandar" style="font-weight: bold !important;">
                {!! Form::label('nro_ticket', 'Nro de Ticket') !!}
                {!! Form::text('nro_ticket', $datos->nro_ticket, ['placeholder' => 'Introduzca el número del Ticket', 'readonly' ]) !!}
            </div>
            <div class="large-12 columns alto-estandar" style="font-weight: bold !important;">
                {!! Form::label('nro_factura', 'Nro de Factura') !!}
                {!! Form::text('nro_factura', $datos->nro_factura, ['placeholder' => 'Introduzca el número de factura', 'readonly' ]) !!}
            </div>
            <div class="large-12 columns alto-estandar" style="font-weight: bold !important;">
                {!! Form::label('proveedor', 'Proveedor') !!}
                {!! Form::text('proveedor', $datos->proveedor, ['placeholder' => 'TDV, HRC ...', 'readonly' ]) !!}
            </div>
            <div class="large-12 columns alto-estandar" style="font-weight: bold !important;">
                {!! Form::label('fecha_compra', 'Fecha de Compra') !!}
                {!! Form::date('fecha_compra', $datos->fecha_compra, ['placeholder' => 'dd-mm-YYYY', 'readonly' ]) !!}
            </div>
            <div class="large-12 columns" style="font-weight: bold !important;">
                {!! Form::label('comentario', 'Comentario') !!}
                {!! Form::textarea('comentario', $datos->comentario, ['placeholder' => 'Explique de manera detallada el soporte a solicitar', 'readonly' ] ) !!}
            </div>
            <div class="large-12 columns" style="font-weight: bold !important;">
                <a href="{{ URL::previous() }}" id="buttona" class="button large" style="text-transform: uppercase;">Atras</a>
            </div>
        </div>
	{!! Form::close() !!}
    
@endsection